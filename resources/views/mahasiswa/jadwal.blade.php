@extends('layouts.mahasiswa')

@section('title', 'Jadwal Kuliah')

@section('content')
<h4 class="mb-4">Jadwal Kuliah</h4>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Ruangan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($schedules as $schedule)
            <tr>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                <td>{{ $schedule->course->name }}</td>
                <td>{{ $schedule->lecturer->name }}</td>
                <td>{{ $schedule->room->name }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">
                    Jadwal belum tersedia
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
