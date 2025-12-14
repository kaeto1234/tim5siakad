@extends('layouts.admin')

@section('title', 'Jadwal Perkuliahan')

@section('content')
<h4 class="mb-4">Jadwal Perkuliahan</h4>

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary">
        + Tambah Jadwal
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>Kelas</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Hari</th>
            <th>Jam</th>
            <th>Ruangan</th>
            <th width="140" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($schedules as $schedule)
            <tr>
                <td>
                    {{ $schedule->classSemester->level }}
                    {{ $schedule->classSemester->classRoom->name }}
                </td>
                <td>{{ $schedule->course->name }}</td>
                <td>{{ $schedule->lecturer->name }}</td>
                <td>{{ $schedule->day }}</td>
                <td>
                    {{ $schedule->start_time }} - {{ $schedule->end_time }}
                </td>
                <td>{{ $schedule->room->code }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.jadwal.edit', $schedule->id) }}"
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.jadwal.destroy', $schedule->id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus jadwal ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted">
                    Belum ada jadwal
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
