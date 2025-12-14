@extends('layouts.admin')

@section('title', 'Edit Semester')

@section('content')
<h4 class="mb-4">Edit Semester</h4>

<form action="{{ route('admin.semester.update', $semester->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Semester</label>
        <select name="name" class="form-select">
            <option value="Ganjil" {{ $semester->name == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
            <option value="Genap" {{ $semester->name == 'Genap' ? 'selected' : '' }}>Genap</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Tahun Ajaran</label>
        <input type="text"
               name="academic_year"
               class="form-control"
               value="{{ $semester->academic_year }}">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.semester.index') }}" class="btn btn-secondary">
        Batal
    </a>
</form>
@endsection
