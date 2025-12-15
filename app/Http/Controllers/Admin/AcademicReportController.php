<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Grade;

class AcademicReportController extends Controller
{
    public function index()
    {
        $students = Student::with([
            'studyProgram',
            'classSemesters',
        ])->get();

        $reports = [];

        foreach ($students as $student) {

            $grades = Grade::with('schedule.course')
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

            $status = ($ipk >= 2.75 && $totalSks >= 144)
                ? 'Lulus'
                : 'Belum Lulus';

            $reports[] = [
                'student'   => $student,
                'ipk'       => $ipk,
                'total_sks' => $totalSks,
                'status'    => $status,
            ];
        }

        return view('admin.laporan.akademik', compact('reports'));
    }
}

