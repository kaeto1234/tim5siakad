@extends('layouts.mahasiswa')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<h4 class="mb-4">Dashboard Mahasiswa</h4>

{{-- PROFIL --}}
<div class="card mb-4">
    <div class="card-body">
        <h5>{{ $student->name }}</h5>
        <small class="text-muted">
            NIM: {{ $student->student_number }} <br>
            Prodi: {{ $student->studyProgram->name }} <br>
            Kelas:
            {{ $classSemester->level ?? '-' }}
            {{ $classSemester->classRoom->name ?? '-' }}
        </small>
    </div>
</div>

{{-- STAT --}}
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4>{{ $total }}</h4>
                <small>Total Pertemuan</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center text-success">
            <div class="card-body">
                <h4>{{ $present }}</h4>
                <small>Hadir</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center text-warning">
            <div class="card-body">
                <h4>{{ $excused }}</h4>
                <small>Izin</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center text-danger">
            <div class="card-body">
                <h4>{{ $absent }}</h4>
                <small>Alfa</small>
            </div>
        </div>
    </div>
</div>

{{-- STATUS --}}
<div class="card">
    <div class="card-body">
        <h5>Persentase Kehadiran</h5>
        <h3>{{ $percentage }}%</h3>

        @if ($percentage >= 75)
            <span class="badge bg-success">
                Memenuhi syarat UAS
            </span>
        @else
            <span class="badge bg-danger">
                Tidak memenuhi syarat UAS
            </span>
        @endif
    </div>
</div>
@endsection
