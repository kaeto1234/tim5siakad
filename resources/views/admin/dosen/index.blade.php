@extends('layouts.app')

@section('title', 'Data Dosen')

@section('content')
<h4 class="mb-4">Data Dosen</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari dosen...">
    </div>
    <a href="#" class="btn btn-primary">+ Tambah Dosen</a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Program Studi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>0123456789</td>
            <td>Budi Santoso</td>
            <td>Teknik Informatika</td>
        </tr>
    </tbody>
</table>
@endsection
