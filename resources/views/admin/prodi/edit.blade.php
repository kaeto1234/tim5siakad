@extends('layouts.admin')

@section('title', 'Edit Prodi')

@section('content')
<h4 class="mb-4">Edit Program Studi</h4>

<form>
    <div class="mb-3">
        <label>Kode Prodi</label>
        <input type="text" class="form-control" value="IF">
    </div>

    <div class="mb-3">
        <label>Nama Prodi</label>
        <input type="text" class="form-control" value="Teknik Informatika">
    </div>

    <div class="mb-4">
        <label>Jurusan</label>
        <select class="form-select">
            <option selected>Teknik</option>
            <option>Ekonomi</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="#" class="btn btn-secondary">Batal</a>
</form>
@endsection
