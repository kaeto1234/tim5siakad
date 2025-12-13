@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h4 class="mb-4">Profil Mahasiswa</h4>

<div class="row">
    {{-- Info Utama --}}
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                Informasi Mahasiswa
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 200px">NIM</th>
                        <td>: {{ $user->nim }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $user->nama }}</td>
                    </tr>
                    <tr>
                        <th>Prodi ID</th>
                        <td>: {{ $user->prodi_id }}</td>
                    </tr>
                    <tr>
                        <th>Angkatan</th>
                        <td>: {{ $user->angkatan }}</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Catatan --}}
        <div class="alert alert-secondary">
            <small>
                Data mahasiswa digunakan untuk keperluan akademik dan administrasi.
            </small>
        </div>
    </div>

    {{-- Sidebar Profil --}}
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <img src="https://via.placeholder.com/120"
                     class="rounded-circle mb-3"
                     alt="Foto Profil">

                <h5 class="mb-0">{{ $user->nama }}</h5>
                <small class="text-muted">Mahasiswa</small>

                <hr>

                <button class="btn btn-outline-primary btn-sm w-100 mb-2">
                    Edit Profil
                </button>

                <button class="btn btn-outline-secondary btn-sm w-100">
                    Ganti Password
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
