<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of courses
     */
    public function index()
    {
        $courses = Course::orderBy('code')->get();

        return view('admin.mata_kuliah.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course
     */
    public function create()
    {
        return view('admin.mata_kuliah.create');
    }

    /**
     * Store a newly created course
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'    => 'required|unique:courses,code',
            'name'    => 'required',
            'credits' => 'required|integer|min:1|max:6',
        ]);

        Course::create([
            'code'    => $request->code,
            'name'    => $request->name,
            'credits' => $request->credits,
        ]);

        return redirect()
            ->route('admin.mata_kuliah.index')
            ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified course
     */
    public function edit(Course $course)
    {
        return view('admin.mata_kuliah.edit', compact('course'));
    }

    /**
     * Update the specified course
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'code'    => 'required|unique:courses,code,' . $course->id,
            'name'    => 'required',
            'credits' => 'required|integer|min:1|max:6',
        ]);

        $course->update([
            'code'    => $request->code,
            'name'    => $request->name,
            'credits' => $request->credits,
        ]);

        return redirect()
            ->route('admin.mata_kuliah.index')
            ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified course
     */
    public function destroy(Course $course)
    {
        // Nanti bisa ditambah proteksi kalau sudah dipakai jadwal
        $course->delete();

        return redirect()
            ->route('admin.mata_kuliah.index')
            ->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
