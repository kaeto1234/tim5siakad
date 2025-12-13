@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
<h4 class="mb-4">Tambah Jadwal Perkuliahan</h4>

<form>
    <div class="mb-3">
        <label>Kelas & Semester</label>
        <select class="form-select">
            <option>-- Pilih Kelas Semester --</option>
            <option>1E - Ganjil 2024</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Mata Kuliah</label>
        <select class="form-select">
            <option>-- Pilih Mata Kuliah --</option>
            <option>Pemrograman Dasar</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Dosen</label>
        <select class="form-select">
            <option>-- Pilih Dosen --</option>
            <option>Budi Santoso</option>
        </select>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label>Hari</label>
            <select class="form-select">
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label>Jam Mulai</label>
            <input type="time" class="form-control">
        </div>

        <div class="col-md-4 mb-3">
            <label>Jam Selesai</label>
            <input type="time" class="form-control">
        </div>
    </div>

    <div class="mb-3">
        <label>Ruangan</label>
        <input type="text" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="#" class="btn btn-secondary">Kembali</a>
</form>
@endsection
