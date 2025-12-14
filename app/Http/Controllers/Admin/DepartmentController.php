<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of departments
     */
    public function index()
    {
        $departments = Department::orderBy('name')->get();
        return view('admin.jurusan.index', compact('departments'));
    }

    /**
     * Show the form for creating a new department
     */
    public function create()
    {
        return view('admin.jurusan.create');
    }

    /**
     * Store a newly created department
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:departments,code',
            'name' => 'required',
        ]);

        Department::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified department
     */
    public function edit(Department $department)
    {
        return view('admin.jurusan.edit', compact('department'));
    }

    /**
     * Update the specified department
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'code' => 'required|unique:departments,code,' . $department->id,
            'name' => 'required',
        ]);

        $department->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil diperbarui.');
    }

    /**
     * Remove the specified department
     */
    public function destroy(Department $department)
    {
        // Catatan:
        // Nanti bisa ditambah pengecekan:
        // if ($department->studyPrograms()->exists()) { ... }

        $department->delete();

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Jurusan berhasil dihapus.');
    }
}
