<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function index()
    {
        $student = Auth::user()->student;

        if (! $student) {
            abort(403, 'Akun ini bukan mahasiswa');
        }

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
