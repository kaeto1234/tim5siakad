@extends('layouts.admin')

@section('title', 'Edit Dosen')

@section('content')
    <h4 class="mb-4">Edit Dosen</h4>

    <form method="POST" action="{{ route('admin.dosen.update', $lecturer->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>NIDN</label>
            <input type="text" name="lecturer_number" class="form-control" value="{{ $lecturer->lecturer_number }}">
        </div>

        <div class="mb-3">
            <label>Nama Dosen</label>
            <input type="text" name="name" class="form-control" value="{{ $lecturer->name }}">
        </div>

        <div class="mb-4">
            <label>Program Studi</label>
            <select name="study_program_id" class="form-select">
                @foreach ($studyPrograms as $prodi)
                    <option value="{{ $prodi->id }}" {{ $lecturer->study_program_id == $prodi->id ? 'selected' : '' }}>
                        {{ $prodi->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </form>
@endsection
