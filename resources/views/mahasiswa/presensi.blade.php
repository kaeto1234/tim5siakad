@extends('layouts.mahasiswa')

@section('title', 'Rekap Presensi')

@section('content')
    <h4 class="mb-4">Rekap Presensi</h4>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Mata Kuliah</th>
                <th>Hadir</th>
                <th>Total</th>
                <th>Persentase</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rekap as $r)
                <tr>
                    <td>{{ $r['course'] }}</td>
                    <td>{{ $r['present'] }}</td>
                    <td>{{ $r['total'] }}</td>
                    <td>{{ $r['percentage'] }}%</td>
                    <td>
                        @if ($r['status'] === 'Memenuhi')
                            <span class="badge bg-success">Memenuhi</span>
                        @else
                            <span class="badge bg-danger">Tidak Memenuhi</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Belum ada data presensi
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if (isset($error))
        <div class="alert alert-warning">
            {{ $error }}
        </div>
    @endif

@endsection
