@extends('layouts.app')

@section('title', 'Dashboard Dosen')

@section('content')
<h4 class="mb-4">Dashboard Dosen</h4>

<div class="row">
    {{-- Informasi Dosen --}}
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                Informasi Dosen
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 200px">NIDN</th>
                        <td>: {{ $user->nidn }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $user->nama }}</td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                        <td>: {{ $user->prodi }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="alert alert-info">
            <small>
                Dashboard ini digunakan dosen untuk mengelola jadwal, presensi, dan nilai mahasiswa.
            </small>
        </div>
    </div>

    {{-- Sidebar --}}
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <img src="https://via.placeholder.com/120"
                     class="rounded-circle mb-3"
                     alt="Foto Profil">

                <h5 class="mb-0">{{ $user->nama }}</h5>
                <small class="text-muted">Dosen</small>

                <hr>

                <a href="{{ route('dosen.jadwal') }}" class="btn btn-outline-primary btn-sm w-100 mb-2">
                    Jadwal Mengajar
                </a>

                <a href="{{ route('dosen.presensi') }}" class="btn btn-outline-secondary btn-sm w-100 mb-2">
                    Presensi
                </a>

                <a href="{{ route('dosen.nilai') }}" class="btn btn-outline-success btn-sm w-100">
                    Input Nilai
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
