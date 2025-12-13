@extends('layouts.admin')

@section('title', 'Data Jurusan')

@section('content')
<h4 class="mb-4">Data Jurusan</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari jurusan...">
    </div>

    <a href="#" class="btn btn-primary">
        + Tambah Jurusan
    </a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th style="width: 180px">Kode Jurusan</th>
            <th>Nama Jurusan</th>
            <th style="width: 140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>IF</td>
            <td>Teknik Informatika</td>
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
