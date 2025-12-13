@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
<h4 class="mb-4">Data Mata Kuliah</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari mata kuliah...">
    </div>
    <a href="#" class="btn btn-primary">+ Tambah Mata Kuliah</a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th style="width:180px">Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th style="width:100px">SKS</th>
            <th style="width:140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>IF101</td>
            <td>Pemrograman Dasar</td>
            <td>3</td>
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
