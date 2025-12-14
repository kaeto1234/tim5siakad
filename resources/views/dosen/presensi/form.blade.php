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
        {{ $schedule->classSemester->classRoom->name }}
        <br>
        <b>Mata Kuliah:</b> {{ $schedule->course->name }}
    </div>
</div>

<form method="POST" action="{{ route('dosen.presensi.store', $schedule->id) }}">
    @csrf

    {{-- MODE CREATE / EDIT --}}
    @if ($mode === 'edit')
        <div class="alert alert-info">
            Presensi pertemuan ke-{{ $meeting->meeting_number }}
            ({{ $meeting->date }})
        </div>
    @endif

    {{-- TANGGAL --}}
    <div class="mb-3">
        <label>Tanggal Pertemuan</label>
        <input type="date"
               name="date"
               class="form-control"
               value="{{ $mode === 'edit' ? $meeting->date : old('date') }}"
               {{ $mode === 'edit' ? 'readonly' : '' }}
               required>
    </div>

    {{-- TOPIK --}}
    <div class="mb-3">
        <label>Topik</label>
        <input type="text"
               name="topic"
               class="form-control"
               value="{{ $mode === 'edit' ? $meeting->topic : old('topic') }}">
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama Mahasiswa</th>
                <th width="220">Status</th>
            </tr>
        </thead>
        <tbody>

        {{-- MODE CREATE --}}
        @if ($mode === 'create')
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
        @endif

        {{-- MODE EDIT --}}
        @if ($mode === 'edit')
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->student->name }}</td>
                    <td>
                        <select name="attendance[{{ $attendance->student_id }}]" class="form-select">
                            <option value="present" {{ $attendance->status === 'present' ? 'selected' : '' }}>
                                Hadir
                            </option>
                            <option value="excused" {{ $attendance->status === 'excused' ? 'selected' : '' }}>
                                Izin
                            </option>
                            <option value="absent" {{ $attendance->status === 'absent' ? 'selected' : '' }}>
                                Alfa
                            </option>
                        </select>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>

    <button class="btn btn-success">
        {{ $mode === 'edit' ? 'Update Presensi' : 'Simpan Presensi' }}
    </button>

    <a href="{{ route('dosen.jadwal') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
