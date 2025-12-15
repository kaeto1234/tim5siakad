<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        if (! $student) {
            abort(403, 'Akun ini bukan mahasiswa');
        }

        $student->load([
            'studyProgram',
            'classSemesters.classRoom',
            'classSemesters.semester',
        ]);

        $classSemester = $student->classSemesters()
            ->latest('student_class_semesters.created_at')
            ->first();

        $attendances = \App\Models\Attendance::where('student_id', $student->id)->get();

        $total = $attendances->count();
        $present = $attendances->where('status', 'present')->count();
        $excused = $attendances->where('status', 'excused')->count();
        $absent = $attendances->where('status', 'absent')->count();

        $percentage = $total ? round(($present / $total) * 100, 2) : 0;

        return view('mahasiswa.dashboard', compact(
            'student',
            'classSemester',
            'total',
            'present',
            'excused',
            'absent',
            'percentage'
        ));
    }
}
