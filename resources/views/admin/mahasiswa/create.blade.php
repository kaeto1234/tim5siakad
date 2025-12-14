@extends('layouts.admin')

@section('title', 'Tambah Mahasiswa')

@section('content')
<h4 class="mb-4">Tambah Mahasiswa</h4>

<form action="{{ route('admin.students.store') }}" method="POST">
    @csrf

    {{-- DATA AKUN --}}
    <h6 class="mb-3">Akun Login</h6>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    {{-- DATA MAHASISWA --}}
    <h6 class="mb-3 mt-4">Data Mahasiswa</h6>

    <div class="mb-3">
        <label>Nama Mahasiswa</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="student_number" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Program Studi</label>
        <select name="study_program_id" class="form-select" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach ($studyPrograms as $prodi)
                <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Kelas</label>
        <select name="class_room_id" class="form-select" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach ($classRooms as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label>Angkatan</label>
        <input type="number" name="enrollment_year" class="form-control" placeholder="2023" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
