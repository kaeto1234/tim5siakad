@extends('layouts.dosen')

@section('title', 'Dashboard Dosen')

@section('content')
<h4 class="mb-4">Dashboard Dosen</h4>

{{-- INFO DOSEN --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="mb-1">{{ $lecturer->name }}</h5>
        <small class="text-muted">
            NIDN: {{ $lecturer->lecturer_number }} <br>
            Program Studi: {{ $lecturer->studyProgram->name ?? '-' }}
        </small>
    </div>
</div>

{{-- STAT --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h3>{{ $totalClasses }}</h3>
                <small>Kelas Diajar</small>
            </div>
        </div>
    </div>
</div>

{{-- JADWAL HARI INI --}}
<div class="card">
    <div class="card-header">
        Jadwal Hari Ini
    </div>

    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead class="table-light">
                <tr>
                    <th>Waktu</th>
                    <th>Kelas</th>
                    <th>Mata Kuliah</th>
                    <th>Ruangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todaySchedules as $schedule)
                    <tr>
                        <td>
                            {{ $schedule->start_time }} -
                            {{ $schedule->end_time }}
                        </td>
                        <td>
                            {{ $schedule->classSemester->level }}
                            {{ $schedule->classSemester->classRoom->name }}
                        </td>
                        <td>{{ $schedule->course->name }}</td>
                        <td>{{ $schedule->room->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Tidak ada jadwal hari ini
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
