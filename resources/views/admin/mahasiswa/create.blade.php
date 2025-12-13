@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<h4 class="mb-4">Tambah Mahasiswa</h4>

<form>
    <div class="mb-3">
        <label>User Akun</label>
        <select class="form-select">
            <option>-- Pilih User (role: mahasiswa) --</option>
            <option>Andi Pratama</option>
        </select>
    </div>

    <div class="mb-3">
        <label>NIM</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama Mahasiswa</label>
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

    <div class="mb-3">
        <label>Kelas</label>
        <select class="form-select">
            <option>-- Pilih Kelas --</option>
            <option>A</option>
            <option>B</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Angkatan</label>
        <input type="number" class="form-control" placeholder="2023">
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="#" class="btn btn-secondary">Kembali</a>
</form>
@endsection
