@extends('layouts.admin')

@section('title', 'Data Semester')

@section('content')
<h4 class="mb-4">Data Semester</h4>

<div class="d-flex justify-content-end mb-3">
    <a href="#" class="btn btn-primary">+ Tambah Semester</a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>Nama Semester</th>
            <th>Tahun Ajaran</th>
            <th>Status</th>
            <th style="width:140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Ganjil</td>
            <td>2024/2025</td>
            <td>
                <span class="badge bg-success">Aktif</span>
            </td>
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
            </td>
        </tr>
        <tr>
            <td>Genap</td>
            <td>2023/2024</td>
            <td>
                <span class="badge bg-secondary">Tidak Aktif</span>
            </td>
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
            </td>
        </tr>
    </tbody>
</table>

<div class="alert alert-secondary mt-3">
    <small>
        Catatan: hanya satu semester yang dapat berstatus aktif.
    </small>
</div>
@endsection
