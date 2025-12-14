@extends('layouts.admin')

@section('title', 'Tambah Kelas Semester')

@section('content')
<h4 class="mb-4">Tambah Kelas Semester</h4>

<form method="POST" action="{{ route('admin.kelas_semester.store') }}">
    @csrf

    <div class="mb-3">
        <label>Kelas</label>
        <select name="class_room_id" class="form-select">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($classRooms as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Semester</label>
        <select name="semester_id" class="form-select">
            <option value="">-- Pilih Semester --</option>
            @foreach ($semesters as $semester)
                <option value="{{ $semester->id }}">
                    {{ $semester->name }} ({{ $semester->academic_year }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Angkatan</label>
        <input type="number" name="batch" class="form-control" placeholder="2024">
    </div>

    <div class="mb-4">
        <label>Level / Semester Ke-</label>
        <input type="number" name="level" class="form-control" min="1" max="8">
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.kelas_semester.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
