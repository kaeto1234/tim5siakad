<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\User;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::with('studyProgram.department')->get();
        return view('admin.dosen.index', compact('lecturers'));
    }

    public function create()
    {
        return view('admin.dosen.create', [
            'studyPrograms' => StudyProgram::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lecturer_number'  => 'required|unique:lecturers,lecturer_number',
            'name'             => 'required|string|max:100',
            'email'            => 'required|email|unique:users,email',
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        // USER (login)
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->lecturer_number), // password = NIDN
            'role'     => 'lecturer',
        ]);

        // LECTURER
        Lecturer::create([
            'user_id'          => $user->id,
            'lecturer_number'  => $request->lecturer_number,
            'name'             => $request->name,
            'study_program_id' => $request->study_program_id,
        ]);

        return redirect()
            ->route('admin.dosen.index')
            ->with('success', 'Dosen berhasil ditambahkan (password awal = NIDN)');
    }

    public function edit(Lecturer $lecturer)
    {
        return view('admin.dosen.edit', [
            'lecturer'      => $lecturer,
            'studyPrograms' => StudyProgram::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $request->validate([
            'lecturer_number'  => 'required|unique:lecturers,lecturer_number,' . $lecturer->id,
            'name'             => 'required|string|max:100',
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        $lecturer->update([
            'lecturer_number'  => $request->lecturer_number,
            'name'             => $request->name,
            'study_program_id' => $request->study_program_id,
        ]);

        // sync nama user
        $lecturer->user->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.dosen.index')
            ->with('success', 'Data dosen diperbarui');
    }

}
