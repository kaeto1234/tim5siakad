@extends('layouts.admin')

@section('title', 'Data Kelas')

@section('content')
<h4 class="mb-4">Data Kelas</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari kelas...">
    </div>
    <a href="#" class="btn btn-primary">+ Tambah Kelas</a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th style="width:200px">Nama Kelas</th>
            <th style="width:140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>A</td>
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
