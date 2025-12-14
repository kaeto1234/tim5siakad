@extends('layouts.mahasiswa')

@section('title', 'Presensi Saya')

@section('content')
<h4 class="mb-4">Presensi Saya</h4>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Mata Kuliah</th>
            <th>Pertemuan</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($attendances as $a)
            <tr>
                <td>{{ $a->meeting->schedule->course->name }}</td>
                <td>{{ $a->meeting->meeting_number }}</td>
                <td>{{ $a->meeting->date }}</td>
                <td>
                    <span class="badge bg-{{ 
                        $a->status == 'present' ? 'success' : 
                        ($a->status == 'excused' ? 'warning' : 'danger') 
                    }}">
                        {{ strtoupper($a->status) }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    Belum ada data presensi
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
