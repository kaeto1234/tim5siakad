<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::with([
            'studyProgram',
            'classSemesters.classRoom',
            'classSemesters.semester',
        ])->first();

        if (! $student) {
            abort(404);
        }

        $classSemester = $student->classSemesters()->latest()->first();

        $attendances = Attendance::where('student_id', $student->id)->get();

        $total = $attendances->count();
        $present = $attendances->where('status', 'present')->count();
        $excused = $attendances->where('status', 'excused')->count();
        $absent = $attendances->where('status', 'absent')->count();

        $percentage = $total
            ? round(($present / $total) * 100, 2)
            : 0;

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

