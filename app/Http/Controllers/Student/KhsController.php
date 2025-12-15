<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class KhsController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        if (! $student) {
            abort(403);
        }

        // ambil kelas semester terakhir
        $classSemester = $student->classSemesters()
            ->latest('student_class_semesters.created_at')
            ->first();

        if (! $classSemester) {
            return view('mahasiswa.khs', [
                'student' => $student,
                'grades' => collect(),
                'ips' => 0,
                'totalSks' => 0,
            ]);
        }

        // ambil nilai mahasiswa di semester tsb
        $grades = Grade::with('schedule.course')
            ->where('student_id', $student->id)
            ->whereHas('schedule', function ($q) use ($classSemester) {
                $q->where('class_semester_id', $classSemester->id);
            })
            ->get();

        // hitung IPS
        $totalBobot = 0;
        $totalSks   = 0;

        foreach ($grades as $grade) {
            $sks = $grade->schedule->course->sks;
            $bobot = match ($grade->grade_letter) {
                'A' => 4,
                'B' => 3,
                'C' => 2,
                'D' => 1,
                default => 0,
            };

            $totalBobot += $bobot * $sks;
            $totalSks   += $sks;
        }

        $ips = $totalSks > 0
            ? round($totalBobot / $totalSks, 2)
            : 0;

        return view('mahasiswa.khs', compact(
            'student',
            'grades',
            'ips',
            'totalSks'
        ));
    }
}

