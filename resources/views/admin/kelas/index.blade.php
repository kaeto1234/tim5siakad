@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')
<h4 class="mb-4">Data Kelas</h4>

{{-- Header tabel: Search + Tambah --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    {{-- Search --}}
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari kelas...">
    </div>

    {{-- Tombol tambah --}}
    <a href="#" class="btn btn-primary">
        + Tambah Kelas
    </a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>Kode Kelas</th>
            <th>Nama Kelas</th>
            <th>Semester</th>
            <th>Dosen</th>
            <th style="width: 140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>IF101</td>
            <td>Pemrograman Dasar</td>
            <td>1</td>
            <td>Budi</td>
            <td class="text-center">
                <button class="btn btn-sm btn-warning">Edit</button>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
