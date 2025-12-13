@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content')
<h4 class="mb-4">Tambah Dosen</h4>

<form>
    <div class="mb-3">
        <label>User Akun</label>
        <select class="form-select">
            <option>-- Pilih User (role: dosen) --</option>
            <option>Budi Santoso</option>
        </select>
    </div>

    <div class="mb-3">
        <label>NIDN</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama Dosen</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-3">
        <label>Program Studi</label>
        <select class="form-select">
            <option>-- Pilih Prodi --</option>
            <option>Teknik Informatika</option>
            <option>Sistem Informasi</option>
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="#" class="btn btn-secondary">Kembali</a>
</form>
@endsection
