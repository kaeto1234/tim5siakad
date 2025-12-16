@extends('layouts.dosen')

@section('title', 'Presensi Mahasiswa')

@section('content')
    <h4 class="mb-4">Presensi Mahasiswa</h4>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- INFO KELAS --}}
    <div class="card mb-3">
        <div class="card-body">
            <b>Kelas:</b>
            {{ $schedule->classSemester->level }}
            {{ $schedule->classSemester->classRoom->name }} <br>

            <b>Mata Kuliah:</b>
            {{ $schedule->course->name }}
        </div>
    </div>

    <form method="POST" action="{{ route('dosen.presensi.store', $schedule->id) }}">
        @csrf

        {{-- TANGGAL --}}
        <div class="mb-3">
            <label>Tanggal Pertemuan</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        {{-- TOPIK --}}
        <div class="mb-3">
            <label>Topik</label>
            <input type="text" name="topic" class="form-control">
        </div>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Mahasiswa</th>
                    <th width="220">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>
                            <select name="attendance[{{ $student->id }}]" class="form-select">
                                <option value="present">Hadir</option>
                                <option value="excused">Izin</option>
                                <option value="absent">Alfa</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-success">
            Simpan Presensi
        </button>

        <a href="{{ route('dosen.jadwal') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
@endsection
