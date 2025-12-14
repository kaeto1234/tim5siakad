<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        // MODE SEMENTARA (tanpa login)
        $lecturer = Lecturer::first();

        if (! $lecturer) {
            abort(404, 'Data dosen belum ada');
        }

        $schedules = Schedule::with([
                'classSemester.classRoom',
                'classSemester.semester',
                'course',
                'room',
            ])
            ->where('lecturer_id', $lecturer->id)
            ->orderBy('day')
            ->orderBy('start_time')
            ->get();

        return view('dosen.jadwal', compact('lecturer', 'schedules'));
    }
}
