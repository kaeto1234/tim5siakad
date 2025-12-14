<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Models\ClassSemester;
use App\Models\StudentClassSemester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::orderByDesc('academic_year')
            ->orderByDesc('name')
            ->get();

        return view('admin.semester.index', compact('semesters'));
    }

    public function create()
    {
        return view('admin.semester.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|in:Ganjil,Genap',
            'academic_year' => 'required',
        ]);

        Semester::create([
            'name'          => $request->name,
            'academic_year' => $request->academic_year,
            'is_active'     => false,
        ]);

        return redirect()
            ->route('admin.semester.index')
            ->with('success', 'Semester berhasil ditambahkan.');
    }

    public function edit(Semester $semester)
    {
        return view('admin.semester.edit', compact('semester'));
    }

    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'name'          => 'required|in:Ganjil,Genap',
            'academic_year' => 'required',
        ]);

        $semester->update([
            'name'          => $request->name,
            'academic_year' => $request->academic_year,
        ]);

        return redirect()
            ->route('admin.semester.index')
            ->with('success', 'Semester berhasil diperbarui.');
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();

        return redirect()
            ->route('admin.semester.index')
            ->with('success', 'Semester berhasil dihapus.');
    }

    /**
     * ===============================
     * 🔥 AKTIFKAN SEMESTER + AUTO NAIK
     * ===============================
     */
    public function activate(Semester $semester)
    {
        DB::transaction(function () use ($semester) {

            // 🔹 Ambil semester lama (jika ada)
            $oldSemester = Semester::where('is_active', true)->first();

            // 🔹 Nonaktifkan semua
            Semester::where('is_active', true)->update(['is_active' => false]);

            // 🔹 Aktifkan semester baru
            $semester->update(['is_active' => true]);

            // ❗ Kalau belum ada semester aktif sebelumnya (pertama kali)
            if (! $oldSemester) {
                return;
            }

            // 🔹 Ambil semua mahasiswa di semester lama
            $studentClassSemesters = StudentClassSemester::with([
                'student',
                'classSemester',
            ])->whereHas('classSemester', function ($q) use ($oldSemester) {
                $q->where('semester_id', $oldSemester->id);
            })->get();

            foreach ($studentClassSemesters as $scs) {

                $student = $scs->student;
                $oldCS   = $scs->classSemester;

                $nextLevel = $oldCS->level + 1;

                // 🔹 Cari class semester tujuan (masih ada slot)
                $targetCS = ClassSemester::withCount('students')
                    ->where('semester_id', $semester->id)
                    ->where('batch', $oldCS->batch)
                    ->where('level', $nextLevel)
                    ->orderBy('class_room_id') // A → B → C
                    ->get()
                    ->firstWhere(fn ($cs) => $cs->students_count < $cs->capacity);

                // ❗ Kalau tidak ada kelas kosong → skip
                if (! $targetCS) {
                    continue;
                }

                // 🔹 Masukkan mahasiswa ke kelas baru
                StudentClassSemester::create([
                    'student_id'        => $student->id,
                    'class_semester_id' => $targetCS->id,
                ]);
            }
        });

        return redirect()
            ->route('admin.semester.index')
            ->with('success', 'Semester berhasil diaktifkan & mahasiswa otomatis naik kelas.');
    }
}
