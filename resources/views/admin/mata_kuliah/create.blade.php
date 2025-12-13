@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<h4 class="mb-4">Tambah Mata Kuliah</h4>

<form>
    <div class="mb-3">
        <label>Kode Mata Kuliah</label>
        <input type="text" class="form-control" placeholder="Contoh: IF101">
    </div>

    <div class="mb-3">
        <label>Nama Mata Kuliah</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-4">
        <label>SKS</label>
        <input type="number" class="form-control" min="1" max="6">
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="#" class="btn btn-secondary">Kembali</a>
</form>
@endsection
