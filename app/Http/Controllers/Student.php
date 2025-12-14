<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Show form create student
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store new student account
     */
    public function store(Request $request)
    {
        // 1️⃣ VALIDATION
        $request->validate([
            'name'             => 'required|string|max:100',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:6',
            'student_number'   => 'required|unique:students,student_number',
            'study_program_id' => 'required',
            'class_room_id'    => 'required',
            'enrollment_year'  => 'required|digits:4',
        ]);

        // 2️⃣ CREATE USER (LOGIN ACCOUNT)
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'student',
        ]);

        // 3️⃣ CREATE STUDENT (ACADEMIC DATA)
        Student::create([
            'user_id'          => $user->id,
            'student_number'   => $request->student_number,
            'name'             => $request->name,
            'study_program_id' => $request->study_program_id,
            'class_room_id'    => $request->class_room_id,
            'enrollment_year'  => $request->enrollment_year,
        ]);

        // 4️⃣ REDIRECT
        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student account created successfully.');
    }
}
