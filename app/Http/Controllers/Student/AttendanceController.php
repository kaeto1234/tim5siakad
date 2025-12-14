<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;

class AttendanceController extends Controller
{
    public function index()
    {
        // MODE SEMENTARA TANPA LOGIN
        $student = \App\Models\Student::first();

        $classSemester = $student->classSemesters()
            ->orderBy('student_class_semesters.created_at', 'desc')
            ->first();

        if (! $classSemester) {
            return view('mahasiswa.presensi', [
                'rekap' => [],
                'error' => 'Mahasiswa belum terdaftar di kelas semester manapun',
            ]);
        }

        $schedules = Schedule::with([
            'course',
            'meetings.attendances' => function ($q) use ($student) {
                $q->where('student_id', $student->id);
            },
        ])
            ->where('class_semester_id', $classSemester->id)
            ->get();

        $rekap = [];

        foreach ($schedules as $schedule) {
            $totalMeetings = $schedule->meetings->count();

            if ($totalMeetings === 0) {
                continue;
            }

            $presentCount = $schedule->meetings
                ->flatMap->attendances
                ->where('status', 'present')
                ->count();

            $percentage = round(($presentCount / $totalMeetings) * 100, 1);

            $rekap[] = [
                'course' => $schedule->course->name,
                'present' => $presentCount,
                'total' => $totalMeetings,
                'percentage' => $percentage,
                'status' => $percentage >= 75 ? 'Memenuhi' : 'Tidak Memenuhi',
            ];
        }

        return view('mahasiswa.presensi', compact('rekap'));
    }
}
