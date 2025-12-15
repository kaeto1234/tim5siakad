@extends('layouts.mahasiswa')

@section('title', 'Kartu Hasil Studi')

@section('content')
    <h4 class="mb-4">Kartu Hasil Studi (KHS)</h4>

    <div class="card mb-3">
        <div class="card-body">
            <strong>{{ $student->name }}</strong><br>
            NIM: {{ $student->student_number }}
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grades as $grade)
                <tr>
                    <td>{{ $grade->schedule->course->name }}</td>
                    <td>{{ $grade->schedule->course->sks }}</td>
                    <td>{{ $grade->final_score }}</td>
                    <td>{{ $grade->grade_letter }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Nilai belum tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="card mt-3">
        <div class="card-body">
            <strong>Total SKS:</strong> {{ $totalSks }} <br>
            <strong>IPS:</strong> {{ $ips }}
        </div>
    </div>
@endsection
