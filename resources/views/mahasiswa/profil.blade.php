{{-- resources/views/mahasiswa/profil.blade.php --}}
@extends('layout.home')

@section('title', 'Profil Mahasiswa')

@section('content')
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <div class="rounded-circle bg-secondary mb-3"
                     style="width:100px;height:100px;margin:auto;"></div>
                <h5 class="card-title mb-0">Nama Mahasiswa</h5>
                <p class="text-muted small mb-0">NIM: 2200001</p>
                <p class="text-muted small">Prodi: Teknik Ngoding</p>
            </div>
        </div>
    </div>

    <div class="col-md-8 mb-3">
        <div class="card shadow-sm">
            <div class="card-header">
                Data Profil
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Email</div>
                    <div class="col-sm-8">mahasiswa@example.com</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">No. HP</div>
                    <div class="col-sm-8">0812-0000-0000</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Alamat</div>
                    <div class="col-sm-8">Jl. Belajar Ngoding No. 5</div>
                </div>

                {{-- nanti bisa diganti form edit profil --}}
                <hr>
                <button class="btn btn-outline-primary btn-sm">Edit Profil</button>
            </div>
        </div>
    </div>
</div>
@endsection
