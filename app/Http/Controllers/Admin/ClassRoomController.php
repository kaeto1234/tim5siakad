<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of class rooms
     */
    public function index()
    {
        $classRooms = ClassRoom::orderBy('name')->get();

        return view('admin.kelas.index', compact('classRooms'));
    }

    /**
     * Show the form for creating a new class room
     */
    public function create()
    {
        return view('admin.kelas.create');
    }

    /**
     * Store a newly created class room
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:class_rooms,name',
        ]);

        ClassRoom::create([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified class room
     */
    public function edit(ClassRoom $classRoom)
    {
        return view('admin.kelas.edit', compact('classRoom'));
    }

    /**
     * Update the specified class room
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        $request->validate([
            'name' => 'required|unique:class_rooms,name,' . $classRoom->id,
        ]);

        $classRoom->update([
            'name' => $request->name,
        ]);

        return redirect()
            ->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified class room
     */
    public function destroy(ClassRoom $classRoom)
    {
        // Catatan:
        // Nanti bisa ditambah proteksi:
        // if ($classRoom->students()->exists()) { ... }

        $classRoom->delete();

        return redirect()
            ->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil dihapus.');
    }
}
