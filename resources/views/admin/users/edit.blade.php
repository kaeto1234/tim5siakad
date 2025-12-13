@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<h4 class="mb-4">Edit User</h4>

<form>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" class="form-control" value="Admin Akademik">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" value="admin@siakad.ac.id">
    </div>

    <div class="mb-3">
        <label>Role</label>
        <select class="form-select">
            <option selected>admin</option>
            <option>dosen</option>
            <option>mahasiswa</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="#" class="btn btn-secondary">Batal</a>
</form>
@endsection
