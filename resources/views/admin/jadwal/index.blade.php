@extends('layouts.admin')

@section('title', 'Jadwal Perkuliahan')

@section('content')
<h4 class="mb-4">Jadwal Perkuliahan</h4>

<div class="d-flex justify-content-end mb-3">
    <a href="#" class="btn btn-primary">+ Tambah Jadwal</a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Ruangan</th>
            <th style="width:120px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1E</td>
            <td>Pemrograman Dasar</td>
            <td>Budi Santoso</td>
            <td>Senin</td>
            <td>08:00 - 10:00</td>
            <td>LAB-1</td>
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
