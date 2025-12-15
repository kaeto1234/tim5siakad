<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // 🔐 AMBIL USER LOGIN
        $user = Auth::user();

        // 🛡️ VALIDASI ROLE
        if ($user->role !== 'lecturer') {
            abort(403, 'Bukan akun dosen');
        }

        // 🔹 AMBIL DATA DOSEN
        $lecturer = $user->lecturer;

        if (! $lecturer) {
            abort(404, 'Data dosen belum terhubung dengan akun');
        }

        // 🔹 total kelas
        $totalClasses = Schedule::where('lecturer_id', $lecturer->id)
            ->distinct('class_semester_id')
            ->count('class_semester_id');

        // 🔹 hari ini (Indonesia)
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
            'todaySchedules',
            'today'
        ));
    }
}
