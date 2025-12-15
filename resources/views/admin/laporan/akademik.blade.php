@extends('layouts.admin')

@section('title', 'Laporan Akademik')

@section('content')
<h4 class="mb-4">Laporan Akademik Mahasiswa</h4>

<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Total SKS</th>
            <th>IPK</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($reports as $row)
            <tr>
                <td>{{ $row['student']->student_number }}</td>
                <td>{{ $row['student']->name }}</td>
                <td>{{ $row['student']->studyProgram->name }}</td>
                <td>{{ $row['total_sks'] }}</td>
                <td>{{ $row['ipk'] }}</td>
                <td>
                    <span class="badge bg-{{ 
                        $row['status'] == 'Lulus' ? 'success' : 'warning' 
                    }}">
                        {{ $row['status'] }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data belum tersedia
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
