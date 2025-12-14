<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;

class GradeController extends Controller
{
    public function index()
    {
        // MODE SEMENTARA TANPA LOGIN
        $student = Student::first();

        $grades = Grade::with('schedule.course')
            ->where('student_id', $student->id)
            ->orderByDesc('created_at')
            ->get();

        return view('mahasiswa.nilai', compact(
            'student',
            'grades'
        ));
    }
}
