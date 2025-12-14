@extends('layouts.admin')

@section('title', 'Edit Program Studi')

@section('content')
<h4 class="mb-4">Edit Program Studi</h4>

<form action="{{ route('admin.prodi.update', $studyProgram->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kode Prodi</label>
        <input type="text"
               name="code"
               class="form-control"
               value="{{ old('code', $studyProgram->code) }}">
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Nama Prodi</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $studyProgram->name) }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-4">
        <label>Jurusan</label>
        <select name="department_id" class="form-select">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}"
                    {{ $studyProgram->department_id == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        @error('department_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.prodi.index') }}" class="btn btn-secondary">
        Batal
    </a>
</form>
@endsection
