@extends('layouts.admin')

@section('title', 'Tambah Program Studi')

@section('content')
<h4 class="mb-4">Tambah Program Studi</h4>

<form action="{{ route('admin.prodi.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Kode Prodi</label>
        <input type="text"
               name="code"
               class="form-control"
               value="{{ old('code') }}">
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Nama Prodi</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name') }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-4">
        <label>Jurusan</label>
        <select name="department_id" class="form-select">
            <option value="">-- Pilih Jurusan --</option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        @error('department_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.prodi.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
