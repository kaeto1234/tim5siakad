@extends('layouts.admin')

@section('title', 'Edit Jurusan')

@section('content')
<h4 class="mb-4">Edit Jurusan</h4>

<form action="{{ route('admin.jurusan.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Kode Jurusan</label>
        <input type="text"
               name="code"
               class="form-control"
               value="{{ old('code', $department->code) }}">
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Jurusan</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $department->name) }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="d-flex gap-2">
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </div>
</form>
@endsection
