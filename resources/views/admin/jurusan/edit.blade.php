@extends('layouts.admin')

@section('title', 'Edit Jurusan')

@section('content')
<h4 class="mb-4">Edit Jurusan</h4>

<form>
    <div class="mb-3">
        <label class="form-label">Kode Jurusan</label>
        <input type="text" class="form-control" value="IF">
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control" value="Teknik Informatika">
    </div>

    <div class="d-flex gap-2">
        <button class="btn btn-primary">Update</button>
        <a href="#" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection
