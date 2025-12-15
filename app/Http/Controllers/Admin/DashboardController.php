<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\StudyProgram;
use App\Models\Course;
use App\Models\Semester;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalLecturers = Lecturer::count();
        $totalStudyPrograms = StudyProgram::count();
        $totalCourses = Course::count();

        $activeSemester = Semester::where('is_active', true)->first();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalLecturers',
            'totalStudyPrograms',
            'totalCourses',
            'activeSemester'
        ));
    }
}
