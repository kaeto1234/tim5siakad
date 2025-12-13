@extends('layouts.app')

@section('title', 'Edit Semester')

@section('content')
<h4 class="mb-4">Edit Semester</h4>

<form>
    <div class="mb-3">
        <label>Nama Semester</label>
        <select class="form-select">
            <option selected>Ganjil</option>
            <option>Genap</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Tahun Ajaran</label>
        <input type="text" class="form-control" value="2024/2025">
    </div>

    <div class="mb-4">
        <label>Status</label>
        <select class="form-select">
            <option value="1" selected>Aktif</option>
            <option value="0">Tidak Aktif</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="#" class="btn btn-secondary">Batal</a>
</form>
@endsection
