@extends('layouts.dosen')

@section('title', 'Jadwal Mengajar')

@section('content')
    <h4 class="mb-4">Jadwal Mengajar</h4>

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

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Kelas</th>
                        <th>Mata Kuliah</th>
                        <th>Ruangan</th>
                        <th width="140" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->day }}</td>
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
                            <td class="text-center">
                                <div class="d-flex flex-column gap-2">
                                    <a href="{{ route('dosen.presensi.form', $schedule->id) }}"
                                        class="btn btn-sm btn-primary">
                                        Presensi
                                    </a>

                                    <a href="{{ route('dosen.nilai.create', $schedule->id) }}"
                                        class="btn btn-sm btn-success">
                                        Nilai
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Jadwal mengajar belum ada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
