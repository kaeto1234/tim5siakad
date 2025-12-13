@extends('layouts.app')

@section('title', 'Data Users')

@section('content')
<h4 class="mb-4">Data Users</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari user...">
    </div>
    <a href="#" class="btn btn-primary">+ Tambah User</a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th style="width:140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Admin Akademik</td>
            <td>admin@siakad.ac.id</td>
            <td><span class="badge bg-primary">admin</span></td>
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
