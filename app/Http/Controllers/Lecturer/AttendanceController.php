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
     * FORM PRESENSI
     * - Jika belum ada → create
     * - Jika sudah ada → edit
     */
    public function create(Schedule $schedule)
    {
        $classSemester = $schedule->classSemester;

        // ambil meeting terakhir untuk jadwal ini
        $meeting = Meeting::where('schedule_id', $schedule->id)
            ->latest('meeting_number')
            ->first();

        // JIKA SUDAH ADA PRESENSI → MODE EDIT
        if ($meeting) {
            $attendances = Attendance::with('student')
                ->where('meeting_id', $meeting->id)
                ->get();

            return view('dosen.presensi.form', [
                'mode'       => 'edit',
                'schedule'   => $schedule,
                'meeting'    => $meeting,
                'attendances'=> $attendances,
            ]);
        }

        // JIKA BELUM ADA → MODE CREATE
        $students = $classSemester->students()
            ->orderBy('name')
            ->get();

        return view('dosen.presensi.form', [
            'mode'     => 'create',
            'schedule' => $schedule,
            'students' => $students,
        ]);
    }

    /**
     * SIMPAN PRESENSI
     * - Create meeting baru ATAU update yang lama
     */
    public function store(Request $request, Schedule $schedule)
    {
        $request->validate([
            'date'       => 'required|date',
            'attendance' => 'required|array',
        ]);

        // cek meeting terakhir
        $meeting = Meeting::where('schedule_id', $schedule->id)
            ->latest('meeting_number')
            ->first();

        // JIKA BELUM ADA MEETING → BUAT BARU
        if (! $meeting) {
            $meetingNumber = Meeting::where('schedule_id', $schedule->id)->count() + 1;

            $meeting = Meeting::create([
                'schedule_id'    => $schedule->id,
                'meeting_number' => $meetingNumber,
                'date'           => $request->date,
                'topic'          => $request->topic,
            ]);
        }

        // SIMPAN / UPDATE PRESENSI
        foreach ($request->attendance as $studentId => $status) {
            Attendance::updateOrCreate(
                [
                    'meeting_id' => $meeting->id,
                    'student_id' => $studentId,
                ],
                [
                    'status' => $status, // present | excused | absent
                ]
            );
        }

        return redirect()
            ->route('dosen.jadwal')
            ->with('success', 'Presensi berhasil disimpan');
    }
}
