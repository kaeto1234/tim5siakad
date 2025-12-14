@extends('layouts.admin')

@section('title', 'Data Kelas Semester')

@section('content')
<h4 class="mb-4">Data Kelas Semester</h4>

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.kelas_semester.create') }}" class="btn btn-primary">
        + Tambah Kelas Semester
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>Kelas</th>
            <th>Angkatan</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Level</th>
            <th width="140" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($classSemesters as $cs)
            <tr>
                <td>{{ $cs->level }}{{ $cs->classRoom->name }}</td>
                <td>{{ $cs->batch }}</td>
                <td>{{ $cs->semester->name }}</td>
                <td>{{ $cs->semester->academic_year }}</td>
                <td>{{ $cs->level }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.kelas_semester.edit', $cs->id) }}"
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.kelas_semester.destroy', $cs->id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus data ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data kelas semester belum ada
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="alert alert-secondary mt-3">
    <small>
        Catatan: Kombinasi <b>Kelas + Semester + Angkatan + Level</b> tidak boleh duplikat.
    </small>
</div>
@endsection
