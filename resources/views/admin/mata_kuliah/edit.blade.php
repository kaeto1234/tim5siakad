@extends('layouts.admin')

@section('title', 'Edit Mata Kuliah')

@section('content')
<h4 class="mb-4">Edit Mata Kuliah</h4>

<form>
    <div class="mb-3">
        <label>Kode Mata Kuliah</label>
        <input type="text" class="form-control" value="IF101">
    </div>

    <div class="mb-3">
        <label>Nama Mata Kuliah</label>
        <input type="text" class="form-control" value="Pemrograman Dasar">
    </div>

    <div class="mb-4">
        <label>SKS</label>
        <input type="number" class="form-control" value="3">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="#" class="btn btn-secondary">Batal</a>
</form>
@endsection
