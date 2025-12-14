@extends('layouts.admin')

@section('title', 'Tambah Kelas')

@section('content')
<h4 class="mb-4">Tambah Kelas</h4>

<form action="{{ route('admin.kelas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama Kelas</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name') }}"
               placeholder="Contoh: A">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
