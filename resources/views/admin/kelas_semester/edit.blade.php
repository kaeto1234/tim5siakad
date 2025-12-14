@extends('layouts.admin')

@section('title', 'Edit Kelas Semester')

@section('content')
<h4 class="mb-4">Edit Kelas Semester</h4>

<form method="POST" action="{{ route('admin.kelas_semester.update', $classSemester->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kelas</label>
        <select name="class_room_id" class="form-select">
            @foreach ($classRooms as $class)
                <option value="{{ $class->id }}"
                    {{ $classSemester->class_room_id == $class->id ? 'selected' : '' }}>
                    {{ $class->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Semester</label>
        <select name="semester_id" class="form-select">
            @foreach ($semesters as $semester)
                <option value="{{ $semester->id }}"
                    {{ $classSemester->semester_id == $semester->id ? 'selected' : '' }}>
                    {{ $semester->name }} ({{ $semester->academic_year }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Angkatan</label>
        <input type="number" name="batch"
               class="form-control" value="{{ $classSemester->batch }}">
    </div>

    <div class="mb-4">
        <label>Level / Semester Ke-</label>
        <input type="number" name="level"
               class="form-control" min="1" max="8"
               value="{{ $classSemester->level }}">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.kelas_semester.index') }}" class="btn btn-secondary">
        Batal
    </a>
</form>
@endsection
