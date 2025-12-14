@extends('layouts.dosen')

@section('title', 'Input Nilai')

@section('content')
<h4 class="mb-4">Input Nilai Mahasiswa</h4>

{{-- INFO KELAS --}}
<div class="card mb-3">
    <div class="card-body">
        <b>Mata Kuliah:</b> {{ $schedule->course->name }} <br>
        <b>Kelas:</b>
        {{ $schedule->classSemester->level }}
        {{ $schedule->classSemester->classRoom->name }} <br>
        <b>Semester:</b> {{ $schedule->classSemester->semester->name }}
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('dosen.nilai.store', $schedule->id) }}" method="POST">
    @csrf

    <table class="table table-bordered align-middle">
        <thead class="table-light text-center">
            <tr>
                <th>Nama Mahasiswa</th>
                <th width="120">Tugas</th>
                <th width="120">UTS</th>
                <th width="120">UAS</th>
                <th width="120">Nilai Akhir</th>
                <th width="100">Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                @php
                    $grade = $grades[$student->id] ?? null;
                @endphp
                <tr>
                    <td>{{ $student->name }}</td>

                    <td>
                        <input type="number"
                               name="grades[{{ $student->id }}][assignment]"
                               class="form-control"
                               min="0" max="100"
                               value="{{ $grade->assignment_score ?? '' }}">
                    </td>

                    <td>
                        <input type="number"
                               name="grades[{{ $student->id }}][midterm]"
                               class="form-control"
                               min="0" max="100"
                               value="{{ $grade->midterm_score ?? '' }}">
                    </td>

                    <td>
                        <input type="number"
                               name="grades[{{ $student->id }}][final_exam]"
                               class="form-control"
                               min="0" max="100"
                               value="{{ $grade->final_exam_score ?? '' }}">
                    </td>

                    <td class="text-center">
                        {{ $grade->final_score ?? '-' }}
                    </td>

                    <td class="text-center">
                        <span class="badge bg-secondary">
                            {{ $grade->grade_letter ?? '-' }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        <button class="btn btn-success">
            Simpan Nilai
        </button>

        <a href="{{ route('dosen.jadwal') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>
</form>
@endsection
