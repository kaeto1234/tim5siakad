<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        // 🔐 ambil user login
        $user = Auth::user();

        if (! $user) {
            abort(403, 'Belum login');
        }

        // 🔹 ambil data dosen dari user
        $lecturer = $user->lecturer;

        if (! $lecturer) {
            abort(404, 'Data dosen belum terhubung dengan akun');
        }

        // 🔹 ambil jadwal dosen ini saja
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

        return view('dosen.jadwal', compact(
            'lecturer',
            'schedules'
        ));
    }
}
