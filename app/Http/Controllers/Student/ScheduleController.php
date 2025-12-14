<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Student;

class ScheduleController extends Controller
{
    public function index()
    {
        // MODE SEMENTARA (tanpa login)
        $student = Student::first();

        // ambil kelas semester aktif mahasiswa
        $classSemesterId = $student->classSemesters()
            ->orderBy('student_class_semesters.created_at', 'desc')
            ->value('class_semester_id');

        $schedules = Schedule::with([
            'course',
            'lecturer',
            'room',
        ])
            ->where('class_semester_id', $classSemesterId)
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('mahasiswa.jadwal', compact('student', 'schedules'));
    }
}
