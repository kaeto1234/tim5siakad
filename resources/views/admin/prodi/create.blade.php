@extends('layouts.app')

@section('title', 'Tambah Prodi')

@section('content')
<h4 class="mb-4">Tambah Program Studi</h4>

<form>
    <div class="mb-3">
        <label>Kode Prodi</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama Prodi</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-4">
        <label>Jurusan</label>
        <select class="form-select">
            <option>-- Pilih Jurusan --</option>
            <option>Teknik</option>
            <option>Ekonomi</option>
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="#" class="btn btn-secondary">Kembali</a>
</form>
@endsection
