<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\ClassSemester;
use App\Models\Semester;
use Illuminate\Http\Request;

class ClassSemesterController extends Controller
{
    public function index()
    {
        $classSemesters = ClassSemester::with(['classRoom', 'semester'])
            ->orderByDesc('batch')          // angkatan terbaru
            ->orderBy('level')              // semester ke 1 → 8
            ->orderBy('class_room_id')      // A → E
            ->get();

        return view('admin.kelas_semester.index', compact('classSemesters'));
    }

    public function create()
    {
        return view('admin.kelas_semester.create', [
            'classRooms' => ClassRoom::orderBy('name')->get(),
            'semesters'  => Semester::orderByDesc('academic_year')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_room_id' => 'required|exists:class_rooms,id',
            'semester_id'   => 'required|exists:semesters,id',
            'batch'         => 'required|digits:4',
            'level'         => 'required|integer|min:1|max:8',
        ]);

        // CEK DUPLIKAT YANG BENAR
        $exists = ClassSemester::where([
            'class_room_id' => $request->class_room_id,
            'semester_id'   => $request->semester_id,
            'batch'         => $request->batch,
            'level'         => $request->level,
        ])->exists();

        if ($exists) {
            return back()->withErrors([
                'class_room_id' =>
                    'Kelas ini sudah ada untuk level, semester, dan angkatan tersebut.',
            ])->withInput();
        }

        ClassSemester::create([
            'class_room_id' => $request->class_room_id,
            'semester_id'   => $request->semester_id,
            'batch'         => $request->batch,
            'level'         => $request->level,
            'capacity'      => 40, // default
        ]);

        return redirect()
            ->route('admin.kelas_semester.index')
            ->with('success', 'Kelas semester berhasil ditambahkan.');
    }

    public function edit(ClassSemester $classSemester)
    {
        return view('admin.kelas_semester.edit', [
            'classSemester' => $classSemester,
            'classRooms'    => ClassRoom::orderBy('name')->get(),
            'semesters'     => Semester::orderByDesc('academic_year')->get(),
        ]);
    }

    public function update(Request $request, ClassSemester $classSemester)
    {
        $request->validate([
            'class_room_id' => 'required|exists:class_rooms,id',
            'semester_id'   => 'required|exists:semesters,id',
            'batch'         => 'required|digits:4',
            'level'         => 'required|integer|min:1|max:8',
        ]);

        $exists = ClassSemester::where([
            'class_room_id' => $request->class_room_id,
            'semester_id'   => $request->semester_id,
            'batch'         => $request->batch,
            'level'         => $request->level,
        ])
            ->where('id', '!=', $classSemester->id)
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'class_room_id' =>
                    'Kelas ini sudah ada untuk level, semester, dan angkatan tersebut.',
            ])->withInput();
        }

        $classSemester->update([
            'class_room_id' => $request->class_room_id,
            'semester_id'   => $request->semester_id,
            'batch'         => $request->batch,
            'level'         => $request->level,
        ]);

        return redirect()
            ->route('admin.kelas_semester.index')
            ->with('success', 'Kelas semester berhasil diperbarui.');
    }

    public function destroy(ClassSemester $classSemester)
    {
        $classSemester->delete();

        return redirect()
            ->route('admin.kelas_semester.index')
            ->with('success', 'Kelas semester berhasil dihapus.');
    }
}
