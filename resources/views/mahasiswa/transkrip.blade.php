@extends('layouts.mahasiswa')

@section('title', 'Transkrip Nilai')

@section('content')
    <h4 class="mb-4">Transkrip Nilai</h4>

    <div class="card mb-3">
        <div class="card-body">
            <strong>{{ $student->name }}</strong><br>
            NIM: {{ $student->student_number }}
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Semester</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grades as $grade)
                <tr>
                    <td>
                        {{ $grade->schedule->classSemester->semester->name }}
                        {{ $grade->schedule->classSemester->semester->academic_year }}
                    </td>
                    <td>{{ $grade->schedule->course->name }}</td>
                    <td>{{ $grade->schedule->course->sks }}</td>
                    <td>{{ $grade->grade_letter }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Belum ada nilai
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="card mt-3">
        <div class="card-body">
            <strong>Total SKS:</strong> {{ $totalSks }} <br>
            <strong>IPK:</strong> {{ $ipk }}
        </div>
    </div>
@endsection
