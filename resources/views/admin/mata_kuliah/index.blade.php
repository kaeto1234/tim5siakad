@extends('layouts.admin')

@section('title', 'Data Mata Kuliah')

@section('content')
<h4 class="mb-4">Data Mata Kuliah</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari mata kuliah...">
    </div>
    <a href="{{ route('admin.mata_kuliah.create') }}" class="btn btn-primary">
        + Tambah Mata Kuliah
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
            <th style="width:160px">Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th style="width:80px">SKS</th>
            <th style="width:160px">Dibuat</th>
            <th style="width:160px">Diubah</th>
            <th style="width:140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($courses as $course)
            <tr>
                <td>{{ $course->code }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->credits }}</td>

                <td>{{ $course->created_at->format('d M Y H:i') }}</td>
                <td>{{ $course->updated_at->format('d M Y H:i') }}</td>

                <td class="text-center">
                    <a href="{{ route('admin.mata_kuliah.edit', $course->id) }}"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('admin.mata_kuliah.destroy', $course->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin hapus mata kuliah ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data mata kuliah belum ada
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
