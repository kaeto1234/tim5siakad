@extends('layouts.admin')

@section('title', 'Edit Ruangan')

@section('content')
<h4 class="mb-4">Edit Ruangan</h4>

<form method="POST" action="{{ route('admin.ruangan.update', $room->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kode Ruangan</label>
        <input type="text" name="code"
               class="form-control"
               value="{{ $room->code }}">
    </div>

    <div class="mb-3">
        <label>Nama Ruangan</label>
        <input type="text" name="name"
               class="form-control"
               value="{{ $room->name }}">
    </div>

    <div class="mb-4">
        <label>Kapasitas</label>
        <input type="number" name="capacity"
               class="form-control"
               value="{{ $room->capacity }}">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.ruangan.index') }}" class="btn btn-secondary">
        Batal
    </a>
</form>
@endsection
