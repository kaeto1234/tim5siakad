@extends('layouts.admin')

@section('title', 'Tambah Jadwal')

@section('content')
    <h4 class="mb-4">Tambah Jadwal Perkuliahan</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.jadwal.store') }}">
        @csrf

        {{-- Kelas Semester --}}
        <div class="mb-3">
            <label>Kelas & Semester</label>
            <select name="class_semester_id" class="form-select">
                <option value="">-- Pilih Kelas Semester --</option>
                @foreach ($classSemesters as $cs)
                    <option value="{{ $cs->id }}">
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
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->code }} - {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Dosen --}}
        <div class="mb-3">
            <label>Dosen</label>
            <select name="lecturer_id" class="form-select">
                <option value="">-- Pilih Dosen --</option>
                @foreach ($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}">
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
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Jam Mulai</label>
                <input type="time" name="start_time" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label>Jam Selesai</label>
                <input type="time" name="end_time" class="form-control">
            </div>
        </div>

        {{-- Ruangan --}}
        <div class="mb-4">
            <label>Ruangan</label>
            <select name="room_id" class="form-select">
                <option value="">-- Pilih Ruangan --</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">
                        {{ $room->code }} - {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

    </form>
@endsection
