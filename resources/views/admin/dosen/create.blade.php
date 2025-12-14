@extends('layouts.admin')

@section('title', 'Tambah Dosen')

@section('content')
    <h4 class="mb-4">Tambah Dosen</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('admin.dosen.store') }}">
        @csrf

        <div class="mb-3">
            <label>NIDN</label>
            <input type="text" name="lecturer_number" class="form-control" placeholder="Contoh: 0123456789">
        </div>

        <div class="mb-3">
            <label>Nama Dosen</label>
            <input type="text" name="name" class="form-control" placeholder="Contoh: Budi Santoso">
        </div>

        <div class="mb-3">
            <label>Email (Login Dosen)</label>
            <input type="email" name="email" class="form-control" placeholder="contoh@kampus.ac.id">
        </div>

        <div class="mb-4">
            <label>Program Studi</label>
            <select name="study_program_id" class="form-select">
                <option value="">-- Pilih Prodi --</option>
                @foreach ($studyPrograms as $prodi)
                    <option value="{{ $prodi->id }}">
                        {{ $prodi->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
@endsection
