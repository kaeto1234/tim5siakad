@extends('layouts.admin')

@section('title', 'Data Program Studi')

@section('content')
<h4 class="mb-4">Data Program Studi</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari prodi...">
    </div>
    <a href="{{ route('admin.prodi.create') }}" class="btn btn-primary">
        + Tambah Prodi
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
            <th style="width:160px">Kode Prodi</th>
            <th>Nama Prodi</th>
            <th>Jurusan</th>
            <th style="width:160px">Dibuat</th>
            <th style="width:160px">Diubah</th>
            <th style="width:140px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($studyPrograms as $prodi)
            <tr>
                <td>{{ $prodi->code }}</td>
                <td>{{ $prodi->name }}</td>
                <td>{{ $prodi->department->name }}</td>

                <td>{{ $prodi->created_at->format('d M Y H:i') }}</td>
                <td>{{ $prodi->updated_at->format('d M Y H:i') }}</td>

                <td class="text-center">
                    <a href="{{ route('admin.prodi.edit', $prodi->id) }}"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('admin.prodi.destroy', $prodi->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin hapus prodi ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data program studi belum ada
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
