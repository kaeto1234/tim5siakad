@extends('layouts.app')

@section('title', 'Data Program Studi')

@section('content')
<h4 class="mb-4">Data Program Studi</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari prodi...">
    </div>
    <a href="#" class="btn btn-primary">+ Tambah Prodi</a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th style="width:180px">Kode Prodi</th>
            <th>Nama Prodi</th>
            <th>Jurusan</th>
            <th style="width:140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>IF</td>
            <td>Teknik Informatika</td>
            <td>Teknik</td>
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
