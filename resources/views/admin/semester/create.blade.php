@extends('layouts.admin')

@section('title', 'Tambah Semester')

@section('content')
<h4 class="mb-4">Tambah Semester</h4>

<form action="{{ route('admin.semester.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Semester</label>
        <select name="name" class="form-select">
            <option value="">-- Pilih --</option>
            <option value="Ganjil" {{ old('name') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
            <option value="Genap" {{ old('name') == 'Genap' ? 'selected' : '' }}>Genap</option>
        </select>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-4">
        <label>Tahun Ajaran</label>
        <input type="text"
               name="academic_year"
               class="form-control"
               value="{{ old('academic_year') }}"
               placeholder="2024/2025">
        @error('academic_year')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.semester.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
