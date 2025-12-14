@extends('layouts.admin')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<h4 class="mb-4">Tambah Mata Kuliah</h4>

<form action="{{ route('admin.mata_kuliah.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Kode Mata Kuliah</label>
        <input type="text"
               name="code"
               class="form-control"
               value="{{ old('code') }}"
               placeholder="Contoh: IF101">
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Nama Mata Kuliah</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name') }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-4">
        <label>SKS</label>
        <input type="number"
               name="credits"
               class="form-control"
               min="1"
               max="6"
               value="{{ old('credits') }}">
        @error('credits')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.mata_kuliah.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
