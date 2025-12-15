<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        if (! $student) {
            abort(403, 'Akun ini bukan mahasiswa');
        }

        // ambil kelas semester TERAKHIR mahasiswa
        $classSemesterId = $student->classSemesters()
            ->orderBy('student_class_semesters.created_at', 'desc')
            ->value('class_semester_id');

        if (! $classSemesterId) {
            return view('mahasiswa.jadwal', [
                'student'   => $student,
                'schedules' => [],
                'error'     => 'Mahasiswa belum terdaftar di kelas semester',
            ]);
        }

        $schedules = Schedule::with([
                'course',
                'lecturer',
                'room',
            ])
            ->where('class_semester_id', $classSemesterId)
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('mahasiswa.jadwal', compact(
            'student',
            'schedules'
        ));
    }
}
