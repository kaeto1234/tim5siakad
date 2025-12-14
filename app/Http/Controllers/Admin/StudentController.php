<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassSemester;
use App\Models\Semester;
use App\Models\Student;
use App\Models\StudentClassSemester;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'studyProgram.department',
            'classSemesters.classRoom',
            'classSemesters.semester',
        ])->get();

        return view('admin.mahasiswa.index', compact('students'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create', [
            'studyPrograms' => StudyProgram::with('department')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'study_program_id' => 'required|exists:study_programs,id',
            'enrollment_year' => 'required|digits:4',
        ]);

        // 🔹 Ambil semester aktif
        $semester = Semester::where('is_active', 1)->firstOrFail();

        // 🔹 Level awal = semester 1
        $level = 1;
        $batch = $request->enrollment_year;

        // 🔹 Cari kelas semester yg masih ada slot
        $classSemester = ClassSemester::withCount('students')
            ->where('batch', $batch)
            ->where('semester_id', $semester->id)
            ->where('level', $level)
            ->orderBy('class_room_id') // A → B → C
            ->get()
            ->firstWhere(fn ($cs) => $cs->students_count < $cs->capacity);

        if (! $classSemester) {
            return back()->withErrors([
                'enrollment_year' => 'Semua kelas untuk angkatan ini sudah penuh.',
            ]);
        }

        // 🔹 Generate NIM (punya kamu, aku pertahanin)
        $studyProgram = StudyProgram::with('department')->findOrFail($request->study_program_id);

        $count = Student::where('study_program_id', $studyProgram->id)
            ->where('enrollment_year', $batch)
            ->count();

        $nim = $studyProgram->department->code
            .$studyProgram->code
            .$batch
            .str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // 🔹 Buat akun
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($nim),
            'role' => 'student',
        ]);

        // 🔹 Buat mahasiswa
        $student = Student::create([
            'user_id' => $user->id,
            'student_number' => $nim,
            'name' => $request->name,
            'study_program_id' => $studyProgram->id,
            'enrollment_year' => $batch,
        ]);

        // 🔹 Masukkan ke kelas otomatis
        StudentClassSemester::create([
            'student_id' => $student->id,
            'class_semester_id' => $classSemester->id,
        ]);

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with('success', "Mahasiswa berhasil ditambahkan ke kelas {$classSemester->level}{$classSemester->classRoom->name}");
    }

    public function destroy(Student $student)
    {
        $student->user->delete();
        $student->delete();

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil dihapus');
    }
}
