@extends('layouts.admin')

@section('title', 'Tambah Ruangan')

@section('content')
<h4 class="mb-4">Tambah Ruangan</h4>

<form method="POST" action="{{ route('admin.ruangan.store') }}">
    @csrf

    <div class="mb-3">
        <label>Kode Ruangan</label>
        <input type="text" name="code" class="form-control"
               placeholder="Contoh: LAB-1">
    </div>

    <div class="mb-3">
        <label>Nama Ruangan</label>
        <input type="text" name="name" class="form-control"
               placeholder="Contoh: Lab Komputer 1">
    </div>

    <div class="mb-4">
        <label>Kapasitas</label>
        <input type="number" name="capacity" class="form-control"
               placeholder="Contoh: 40">
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.ruangan.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
