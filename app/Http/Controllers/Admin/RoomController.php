<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of rooms
     */
    public function index()
    {
        $rooms = Room::orderBy('code')->get();
        return view('admin.ruangan.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new room
     */
    public function create()
    {
        return view('admin.ruangan.create');
    }

    /**
     * Store a newly created room
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'     => 'required|string|max:20|unique:rooms,code',
            'name'     => 'required|string|max:100',
            'capacity' => 'nullable|integer|min:1',
        ]);

        Room::create($request->all());

        return redirect()
            ->route('admin.ruangan.index')
            ->with('success', 'Ruangan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified room
     */
    public function edit(Room $room)
    {
        return view('admin.ruangan.edit', compact('room'));
    }

    /**
     * Update the specified room
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'code'     => 'required|string|max:20|unique:rooms,code,' . $room->id,
            'name'     => 'required|string|max:100',
            'capacity' => 'nullable|integer|min:1',
        ]);

        $room->update($request->all());

        return redirect()
            ->route('admin.ruangan.index')
            ->with('success', 'Ruangan berhasil diperbarui.');
    }

    /**
     * Remove the specified room
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()
            ->route('admin.ruangan.index')
            ->with('success', 'Ruangan berhasil dihapus.');
    }
}
