@extends('layouts.mahasiswa')

@section('title', 'Nilai')

@section('content')
<h4 class="mb-4">Nilai Mahasiswa</h4>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Mata Kuliah</th>
            <th>Tugas</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Nilai Akhir</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($grades as $grade)
            <tr>
                <td>{{ $grade->schedule->course->name }}</td>
                <td>{{ $grade->assignment_score ?? '-' }}</td>
                <td>{{ $grade->midterm_score ?? '-' }}</td>
                <td>{{ $grade->final_exam_score ?? '-' }}</td>
                <td><b>{{ $grade->final_score ?? '-' }}</b></td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">
                    Nilai belum tersedia
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
