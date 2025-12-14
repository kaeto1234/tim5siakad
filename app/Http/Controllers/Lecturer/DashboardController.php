<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Schedule;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔹 MODE SEMENTARA (TANPA LOGIN)
        $lecturer = Lecturer::first();

        if (! $lecturer) {
            abort(404, 'Data dosen belum ada');
        }

        // 🔹 total kelas yang diajar
        $totalClasses = Schedule::where('lecturer_id', $lecturer->id)
            ->distinct('class_semester_id')
            ->count('class_semester_id');

        // 🔹 hari ini (Indonesia, fix)
        $today = now()->locale('id')->dayName;

        // 🔹 jadwal hari ini
        $todaySchedules = Schedule::with([
                'classSemester.classRoom',
                'course',
                'room',
            ])
            ->where('lecturer_id', $lecturer->id)
            ->where('day', $today)
            ->orderBy('start_time')
            ->get();

        return view('dosen.dashboard', compact(
            'lecturer',
            'totalClasses',
            'todaySchedules'
        ));
    }
}
