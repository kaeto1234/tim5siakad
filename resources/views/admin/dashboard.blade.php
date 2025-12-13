@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h4 class="mb-4">Profil Pengguna</h4>

<div class="row">
    {{-- Info Utama --}}
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                Informasi Akun
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 200px">Nama</th>
                        <td>: Admin Akademik</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: admin@siakad.ac.id</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>: Admin</td>
                    </tr>
                    <tr>
                        <th>Status Akun</th>
                        <td>: Aktif</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- Catatan Role --}}
        <div class="alert alert-secondary">
            <small>
                {{-- Konten ini nantinya berbeda sesuai role --}}
                Admin memiliki akses penuh terhadap pengelolaan data akademik.
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

                <h5 class="mb-0">Admin Akademik</h5>
                <small class="text-muted">Administrator</small>

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
