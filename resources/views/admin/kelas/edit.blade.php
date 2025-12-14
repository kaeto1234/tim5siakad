@extends('layouts.admin')

@section('title', 'Edit Kelas')

@section('content')
<h4 class="mb-4">Edit Kelas</h4>

<form action="{{ route('admin.kelas.update', $classRoom->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Kelas</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $classRoom->name) }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">
        Batal
    </a>
</form>
@endsection
