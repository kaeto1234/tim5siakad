@extends('layouts.admin')

@section('title', 'Edit Jadwal')

@section('content')
<h4 class="mb-4">Edit Jadwal Perkuliahan</h4>

<form>
    {{-- Kelas & Semester --}}
    <div class="mb-3">
        <label class="form-label">Kelas & Semester</label>
        <select class="form-select">
            <option>-- Pilih Kelas Semester --</option>
            <option selected>1E - Ganjil 2024</option>
            <option>2E - Genap 2024</option>
        </select>
    </div>

    {{-- Mata Kuliah --}}
    <div class="mb-3">
        <label class="form-label">Mata Kuliah</label>
        <select class="form-select">
            <option>-- Pilih Mata Kuliah --</option>
            <option selected>Pemrograman Dasar</option>
            <option>Basis Data</option>
        </select>
    </div>

    {{-- Dosen --}}
    <div class="mb-3">
        <label class="form-label">Dosen Pengampu</label>
        <select class="form-select">
            <option>-- Pilih Dosen --</option>
            <option selected>Budi Santoso</option>
            <option>Ani Wijaya</option>
        </select>
    </div>

    {{-- Hari & Jam --}}
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="form-label">Hari</label>
            <select class="form-select">
                <option selected>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Jam Mulai</label>
            <input type="time" class="form-control" value="08:00">
        </div>

        <div class="col-md-4 mb-3">
            <label class="form-label">Jam Selesai</label>
            <input type="time" class="form-control" value="10:00">
        </div>
    </div>

    {{-- Ruangan --}}
    <div class="mb-4">
        <label class="form-label">Ruangan</label>
        <input type="text" class="form-control" value="LAB-1">
    </div>

    {{-- Action --}}
    <div class="d-flex gap-2">
        <button class="btn btn-primary">Update Jadwal</button>
        <a href="#" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection
