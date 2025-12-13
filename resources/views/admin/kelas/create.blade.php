@extends('layouts.admin')

@section('title', 'Tambah Kelas')

@section('content')
<h4 class="mb-4">Tambah Kelas</h4>

<form>
    <div class="mb-3">
        <label class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" placeholder="Contoh: A">
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="#" class="btn btn-secondary">Kembali</a>
</form>
@endsection
