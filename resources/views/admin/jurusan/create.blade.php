@extends('layouts.admin')

@section('title', 'Tambah Jurusan')

@section('content')
<h4 class="mb-4">Tambah Jurusan</h4>

<form action="{{ route('admin.jurusan.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Kode Jurusan</label>
        <input type="text"
               name="code"
               class="form-control"
               value="{{ old('code') }}"
               placeholder="Contoh: IF">
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Jurusan</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name') }}"
               placeholder="Contoh: Teknik Informatika">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="d-flex gap-2">
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</form>
@endsection
