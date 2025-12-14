@extends('layouts.admin')

@section('title', 'Data Semester')

@section('content')
<h4 class="mb-4">Data Semester</h4>

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.semester.create') }}" class="btn btn-primary">
        + Tambah Semester
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>Nama Semester</th>
            <th>Tahun Ajaran</th>
            <th>Status</th>
            <th style="width:220px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($semesters as $semester)
            <tr>
                <td>{{ $semester->name }}</td>
                <td>{{ $semester->academic_year }}</td>
                <td>
                    @if ($semester->is_active)
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-secondary">Tidak Aktif</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.semester.edit', $semester->id) }}"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    @if (! $semester->is_active)
                        <form action="{{ route('admin.semester.activate', $semester->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm btn-success"
                                    onclick="return confirm('Aktifkan semester ini?')">
                                Aktifkan
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    Data semester belum ada
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="alert alert-secondary mt-3">
    <small>
        Catatan: hanya satu semester yang dapat berstatus aktif.
    </small>
</div>
@endsection
