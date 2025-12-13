@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
<h4 class="mb-4">Tambah User</h4>

<form>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" class="form-control">
    </div>

    <div class="mb-3">
        <label>Role</label>
        <select class="form-select">
            <option>admin</option>
            <option>dosen</option>
            <option>mahasiswa</option>
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="#" class="btn btn-secondary">Kembali</a>
</form>
@endsection
