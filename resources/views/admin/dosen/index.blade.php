@extends('layouts.admin')

@section('title', 'Data Dosen')

@section('content')
    <h4 class="mb-4">Data Dosen</h4>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="col-md-4 px-0">
            <input type="text" class="form-control" placeholder="Cari dosen...">
        </div>

        <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary">
            + Tambah Dosen
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Jurusan</th>
                <th width="140" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lecturers as $lecturer)
                <tr>
                    <td>{{ $lecturer->lecturer_number }}</td>
                    <td>{{ $lecturer->name }}</td>
                    <td>{{ $lecturer->studyProgram->name ?? '-' }}</td>
                    <td>{{ $lecturer->studyProgram->department->name ?? '-' }}</td>>
                    <td class="text-center">
                        <a href="{{ route('admin.dosen.edit', $lecturer->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Data dosen belum ada
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
