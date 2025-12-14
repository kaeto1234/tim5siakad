<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudyProgram;
use App\Models\Department;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of study programs
     */
    public function index()
    {
        $studyPrograms = StudyProgram::with('department')
            ->orderBy('name')
            ->get();

        return view('admin.prodi.index', compact('studyPrograms'));
    }

    /**
     * Show the form for creating a new study program
     */
    public function create()
    {
        $departments = Department::orderBy('name')->get();

        return view('admin.prodi.create', compact('departments'));
    }

    /**
     * Store a newly created study program
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'code'          => 'required|unique:study_programs,code',
            'name'          => 'required',
        ]);

        StudyProgram::create([
            'department_id' => $request->department_id,
            'code'          => $request->code,
            'name'          => $request->name,
        ]);

        return redirect()
            ->route('admin.prodi.index')
            ->with('success', 'Program Studi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified study program
     */
    public function edit(StudyProgram $studyProgram)
    {
        $departments = Department::orderBy('name')->get();

        return view('admin.prodi.edit', compact('studyProgram', 'departments'));
    }

    /**
     * Update the specified study program
     */
    public function update(Request $request, StudyProgram $studyProgram)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'code'          => 'required|unique:study_programs,code,' . $studyProgram->id,
            'name'          => 'required',
        ]);

        $studyProgram->update([
            'department_id' => $request->department_id,
            'code'          => $request->code,
            'name'          => $request->name,
        ]);

        return redirect()
            ->route('admin.prodi.index')
            ->with('success', 'Program Studi berhasil diperbarui.');
    }

    /**
     * Remove the specified study program
     */
    public function destroy(StudyProgram $studyProgram)
    {
        // Nanti bisa ditambah proteksi:
        // if ($studyProgram->students()->exists()) { ... }

        $studyProgram->delete();

        return redirect()
            ->route('admin.prodi.index')
            ->with('success', 'Program Studi berhasil dihapus.');
    }
}
