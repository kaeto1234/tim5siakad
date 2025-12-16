<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Meeting;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * FORM PRESENSI (SELALU PERTEMUAN BARU)
     */
    public function create(Schedule $schedule)
    {
        $students = $schedule->classSemester
            ->students()
            ->orderBy('name')
            ->get();

        return view('dosen.presensi.form', compact(
            'schedule',
            'students'
        ));
    }

    /**
     * SIMPAN PRESENSI (PERTEMUAN BARU)
     */
    public function store(Request $request, Schedule $schedule)
    {
        $request->validate([
            'date'       => 'required|date',
            'attendance' => 'required|array',
        ]);

        // hitung pertemuan ke-
        $meetingNumber = Meeting::where('schedule_id', $schedule->id)->count() + 1;

        // buat meeting baru
        $meeting = Meeting::create([
            'schedule_id'    => $schedule->id,
            'meeting_number' => $meetingNumber,
            'date'           => $request->date,
            'topic'          => $request->topic,
        ]);

        // simpan presensi mahasiswa
        foreach ($request->attendance as $studentId => $status) {
            Attendance::create([
                'meeting_id' => $meeting->id,
                'student_id' => $studentId,
                'status'     => $status, // present | excused | absent
            ]);
        }

        return redirect()
            ->route('dosen.jadwal')
            ->with('success', "Presensi pertemuan ke-{$meetingNumber} berhasil disimpan");
    }
}
