@extends('layouts.admin')

@section('title', 'Data Mahasiswa')

@section('content')
<h4 class="mb-4">Data Mahasiswa</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari mahasiswa...">
    </div>
    <a href="{{ route('admin.students.create') }}" class="btn btn-primary">
        + Tambah Mahasiswa
    </a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Kelas</th>
            <th>Angkatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->student_number }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->studyProgram->name }}</td>
            <td>{{ $student->classRoom->name }}</td>
            <td>{{ $student->enrollment_year }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
