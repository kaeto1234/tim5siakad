@extends('layouts.admin')

@section('title', 'Data Ruangan')

@section('content')
<h4 class="mb-4">Data Ruangan</h4>

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.ruangan.create') }}" class="btn btn-primary">
        + Tambah Ruangan
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th style="width:150px">Kode</th>
            <th>Nama Ruangan</th>
            <th>Kapasitas</th>
            <th style="width:140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($rooms as $room)
            <tr>
                <td>{{ $room->code }}</td>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity ?? '-' }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.ruangan.edit', $room->id) }}"
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.ruangan.destroy', $room->id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus ruangan ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    Data ruangan belum ada
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
