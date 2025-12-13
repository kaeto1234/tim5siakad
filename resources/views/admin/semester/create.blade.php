@extends('layouts.admin')

@section('title', 'Tambah Semester')

@section('content')
<h4 class="mb-4">Tambah Semester</h4>

<form>
    <div class="mb-3">
        <label>Nama Semester</label>
        <select class="form-select">
            <option>Ganjil</option>
            <option>Genap</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Tahun Ajaran</label>
        <input type="text" class="form-control" placeholder="2024/2025">
    </div>

    <div class="mb-4">
        <label>Status</label>
        <select class="form-select">
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="#" class="btn btn-secondary">Kembali</a>
</form>
@endsection
