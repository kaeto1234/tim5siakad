@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h4 class="mb-4">Dashboard Admin</h4>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h3>{{ $totalStudents }}</h3>
                <small>Mahasiswa</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h3>{{ $totalLecturers }}</h3>
                <small>Dosen</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h3>{{ $totalStudyPrograms }}</h3>
                <small>Program Studi</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h3>{{ $totalCourses }}</h3>
                <small>Mata Kuliah</small>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5>Semester Aktif</h5>

        @if ($activeSemester)
            <p class="mb-0">
                <strong>{{ $activeSemester->name }}</strong>
                ({{ $activeSemester->academic_year }})
            </p>
        @else
            <span class="text-danger">Belum ada semester aktif</span>
        @endif
    </div>
</div>
@endsection
