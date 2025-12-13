@extends('layouts.app')

@section('title', 'Tambah Kelas')

@section('content')
<h4 class="mb-3">Tambah Kelas</h4>

<form>
    <div class="mb-2">
        <label>Kode Kelas</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-2">
        <label>Nama Kelas</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-2">
        <label>Semester</label>
        <input type="number" class="form-control">
    </div>

    <div class="mb-3">
        <label>Dosen</label>
        <input type="text" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>

{{-- Mahasiswa nanti punya tambahan select presensi di sini --}}
@endsection
