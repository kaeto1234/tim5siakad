@extends('layouts.admin')

@section('title', 'Tambah Mahasiswa')

@section('content')
<h4 class="mb-4">Tambah Mahasiswa</h4>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.mahasiswa.store') }}" method="POST">
    @csrf

    {{-- AKUN LOGIN --}}
    <h6 class="mb-3">Akun Login</h6>

    <div class="mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email') }}"
               required>
        <small class="text-muted">
            Password otomatis = NIM
        </small>
    </div>

    {{-- DATA MAHASISWA --}}
    <h6 class="mb-3 mt-4">Data Mahasiswa</h6>

    <div class="mb-3">
        <label>Nama Mahasiswa</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name') }}"
               required>
    </div>

    <div class="mb-3">
        <label>Program Studi</label>
        <select name="study_program_id" class="form-select" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach ($studyPrograms as $prodi)
                <option value="{{ $prodi->id }}"
                    {{ old('study_program_id') == $prodi->id ? 'selected' : '' }}>
                    {{ $prodi->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label>Angkatan</label>
        <input type="number"
               name="enrollment_year"
               class="form-control"
               placeholder="2024"
               value="{{ old('enrollment_year') }}"
               required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
