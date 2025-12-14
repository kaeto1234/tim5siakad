@extends('layouts.admin')

@section('title', 'Edit Jadwal')

@section('content')
    <h4 class="mb-4">Edit Jadwal Perkuliahan</h4>

    <form method="POST" action="{{ route('admin.jadwal.update', $schedule->id) }}">
        @csrf
        @method('PUT')

        {{-- Kelas Semester --}}
        <div class="mb-3">
            <label>Kelas & Semester</label>
            <select name="class_semester_id" class="form-select">
                @foreach ($classSemesters as $cs)
                    <option value="{{ $cs->id }}" {{ $schedule->class_semester_id == $cs->id ? 'selected' : '' }}>
                        {{ $cs->level }}{{ $cs->classRoom->name }}
                        - {{ $cs->semester->name }}
                        {{ $cs->semester->academic_year }}
                        ({{ $cs->batch }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Mata Kuliah --}}
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <select name="course_id" class="form-select">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $schedule->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Dosen --}}
        <div class="mb-3">
            <label>Dosen</label>
            <select name="lecturer_id" class="form-select">
                @foreach ($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}" {{ $schedule->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                        {{ $lecturer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Hari & Jam --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Hari</label>
                <select name="day" class="form-select">
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $day)
                        <option {{ $schedule->day == $day ? 'selected' : '' }}>
                            {{ $day }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Jam Mulai</label>
                <input type="time" name="start_time" class="form-control" value="{{ $schedule->start_time }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Jam Selesai</label>
                <input type="time" name="end_time" class="form-control" value="{{ $schedule->end_time }}">
            </div>
        </div>

        {{-- Ruangan --}}
        <div class="mb-4">
            <label>Ruangan</label>
            <select name="room_id" class="form-select">
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $schedule->room_id == $room->id ? 'selected' : '' }}>
                        {{ $room->code }} - {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection
