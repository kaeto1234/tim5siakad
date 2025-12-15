<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class TranscriptController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        if (! $student) {
            abort(403);
        }

        // ambil SEMUA nilai mahasiswa
        $grades = Grade::with([
                'schedule.course',
                'schedule.classSemester.semester',
            ])
            ->where('student_id', $student->id)
            ->get();

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

        $ipk = $totalSks > 0
            ? round($totalBobot / $totalSks, 2)
            : 0;

        return view('mahasiswa.transkrip', compact(
            'student',
            'grades',
            'ipk',
            'totalSks'
        ));
    }
}

