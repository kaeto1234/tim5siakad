@extends('layouts.admin')

@section('title', 'Edit Mata Kuliah')

@section('content')
<h4 class="mb-4">Edit Mata Kuliah</h4>

<form action="{{ route('admin.mata_kuliah.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kode Mata Kuliah</label>
        <input type="text"
               name="code"
               class="form-control"
               value="{{ old('code', $course->code) }}">
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Nama Mata Kuliah</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $course->name) }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-4">
        <label>SKS</label>
        <input type="number"
               name="credits"
               class="form-control"
               min="1"
               max="6"
               value="{{ old('credits', $course->credits) }}">
        @error('credits')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.mata_kuliah.index') }}" class="btn btn-secondary">
        Batal
    </a>
</form>
@endsection
