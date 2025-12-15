<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (! $user || ! $user->student) {
            abort(403, 'Akun ini bukan mahasiswa');
        }

        $student = $user->student;

        $classSemester = $student->classSemesters()
            ->latest('student_class_semesters.created_at')
            ->first();

        if (! $classSemester) {
            return view('mahasiswa.krs', [
                'student' => $student,
                'classSemester' => null,
                'schedules' => collect(),
            ]);
        }

        $schedules = Schedule::with(['course', 'lecturer'])
            ->where('class_semester_id', $classSemester->id)
            ->get();

        return view('mahasiswa.krs', compact(
            'student',
            'classSemester',
            'schedules'
        ));
    }
}
