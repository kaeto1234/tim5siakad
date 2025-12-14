@extends('layouts.admin')

@section('title', 'Data Jurusan')

@section('content')
    <h4 class="mb-4">Data Jurusan</h4>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="col-md-4 px-0">
            <input type="text" class="form-control" placeholder="Cari jurusan...">
        </div>

        <a href="{{ route('admin.jurusan.create') }}" class="btn btn-primary">
            + Tambah Jurusan
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
                <th style="width: 180px">Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th style="width: 160px">Dibuat</th>
                <th style="width: 160px">Diubah</th>
                <th style="width: 140px" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $department)
                <tr>
                    <td>{{ $department->code }}</td>
                    <td>{{ $department->name }}</td>

                    <td>
                        {{ $department->created_at->format('d M Y H:i') }}
                    </td>

                    <td>
                        {{ $department->updated_at->format('d M Y H:i') }}
                    </td>

                    <td class="text-center">
                        <a href="{{ route('admin.jurusan.edit', $department->id) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.jurusan.destroy', $department->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus jurusan ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Data jurusan belum ada
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
@endsection
