<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\ClassSemester;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Room;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of schedules
     */
    public function index()
    {
        $schedules = Schedule::with([
            'classSemester.classRoom',
            'classSemester.semester',
            'course',
            'lecturer',
        ])->orderBy('day')->get();

        return view('admin.jadwal.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new schedule
     */
    public function create()
    {
        return view('admin.jadwal.create', [
            'classSemesters' => ClassSemester::with(['classRoom', 'semester'])
                ->orderBy('batch', 'desc')
                ->get(),
            'courses'   => Course::orderBy('name')->get(),
            'lecturers' => Lecturer::orderBy('name')->get(),
            'rooms' => Room::orderBy('code')->get(),

        ]);
    }

    /**
     * Store a newly created schedule
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_semester_id' => 'required|exists:class_semesters,id',
            'course_id'         => 'required|exists:courses,id',
            'lecturer_id'       => 'required|exists:lecturers,id',
            'day'               => 'required',
            'start_time'        => 'required',
            'end_time'          => 'required|after:start_time',
            'room_id'           => 'required|string|max:50',
            'room_id'           => 'required|exists:rooms,id',

        ]);

        Schedule::create([
            'class_semester_id' => $request->class_semester_id,
            'course_id'         => $request->course_id,
            'lecturer_id'       => $request->lecturer_id,
            'day'               => $request->day,
            'start_time'        => $request->start_time,
            'end_time'          => $request->end_time,
            'room_id'           => $request->room_id,
        ]);

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified schedule
     */
    public function edit(Schedule $schedule)
    {
        return view('admin.jadwal.edit', [
            'schedule'       => $schedule,
            'classSemesters' => ClassSemester::with(['classRoom', 'semester'])->get(),
            'courses'        => Course::orderBy('name')->get(),
            'lecturers'      => Lecturer::orderBy('name')->get(),
            'rooms' => Room::orderBy('code')->get(),

        ]);
    }

    /**
     * Update the specified schedule
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'class_semester_id' => 'required|exists:class_semesters,id',
            'course_id'         => 'required|exists:courses,id',
            'lecturer_id'       => 'required|exists:lecturers,id',
            'day'               => 'required',
            'start_time'        => 'required',
            'end_time'          => 'required|after:start_time',
            'room_id'           => 'required|string|max:50',
            'room_id'           => 'required|exists:rooms,id',

        ]);

        $schedule->update([
            'class_semester_id' => $request->class_semester_id,
            'course_id'         => $request->course_id,
            'lecturer_id'       => $request->lecturer_id,
            'day'               => $request->day,
            'start_time'        => $request->start_time,
            'end_time'          => $request->end_time,
            'room_id'           => $request->room_id,
        ]);

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified schedule
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
