@extends('layouts.mahasiswa')

@section('title', 'KRS Saya')

@section('content')
    <h4 class="mb-4">KRS Semester {{ $classSemester->semester->name }}</h4>
    @if (!$classSemester)
        <div class="alert alert-warning">
            Anda belum terdaftar pada kelas semester.
        </div>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Dosen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->course->name }}</td>
                        <td>{{ $schedule->course->sks }}</td>
                        <td>{{ $schedule->lecturer->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>.
    @endif

@endsection
