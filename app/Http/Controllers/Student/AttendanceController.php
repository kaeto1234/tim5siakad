<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * LIST PRESENSI DETAIL (per pertemuan)
     */
    public function index()
    {
        $student = Auth::user()->student;

        if (! $student) {
            abort(403, 'Akun ini bukan mahasiswa');
        }

        $attendances = \App\Models\Attendance::with([
                'meeting.schedule.course',
            ])
            ->where('student_id', $student->id)
            ->orderByDesc('meeting_id')
            ->get();

        return view('mahasiswa.presensi.index', compact(
            'student',
            'attendances'
        ));
    }

    /**
     * REKAP PRESENSI (persentase)
     */
    public function rekap()
    {
        $student = Auth::user()->student;

        if (! $student) {
            abort(403, 'Akun ini bukan mahasiswa');
        }

        // ambil kelas semester TERAKHIR
        $classSemester = $student->classSemesters()
            ->orderBy('student_class_semesters.created_at', 'desc')
            ->first();

        if (! $classSemester) {
            return view('mahasiswa.presensi.rekap', [
                'student' => $student,
                'rekap'   => [],
                'error'   => 'Mahasiswa belum terdaftar di kelas semester manapun',
            ]);
        }

        // ambil semua jadwal di kelas tsb
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
                'course'     => $schedule->course->name,
                'present'    => $presentCount,
                'total'      => $totalMeetings,
                'percentage' => $percentage,
                'status'     => $percentage >= 75
                                ? 'Memenuhi'
                                : 'Tidak Memenuhi',
            ];
        }

        return view('mahasiswa.presensi.rekap', compact(
            'student',
            'rekap'
        ));
    }
}
