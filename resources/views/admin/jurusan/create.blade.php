@extends('layouts.admin')

@section('title', 'Tambah Jurusan')

@section('content')
<h4 class="mb-4">Tambah Jurusan</h4>

<form>
    <div class="mb-3">
        <label class="form-label">Kode Jurusan</label>
        <input type="text" class="form-control" placeholder="Contoh: IF">
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" placeholder="Contoh: Teknik Informatika">
    </div>

    <div class="d-flex gap-2">
        <button class="btn btn-success">Simpan</button>
        <a href="#" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
