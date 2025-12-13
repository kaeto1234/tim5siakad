@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')
<h4 class="mb-4">Edit Kelas</h4>

<form>
    <div class="mb-3">
        <label class="form-label">Nama Kelas</label>
        <input type="text" class="form-control" value="A">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="#" class="btn btn-secondary">Batal</a>
</form>
@endsection
