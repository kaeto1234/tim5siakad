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
     * FORM PRESENSI (PERTEMUAN BARU)
     */
    public function create(Schedule $schedule)
    {
        $students = $schedule->classSemester
            ->students()
            ->orderBy('name')
            ->get();

        return view('dosen.presensi.form', [
            'schedule' => $schedule,
            'students' => $students,
        ]);
    }

    /**
     * SIMPAN PRESENSI (SELALU MEETING BARU)
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

        // simpan presensi
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

    /**
     * UPDATE STATUS PRESENSI (TELAT / REVISI)
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'status' => 'required|in:present,excused,absent',
        ]);

        $attendance->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status presensi berhasil diperbarui');
    }
}
