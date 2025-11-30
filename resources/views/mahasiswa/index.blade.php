{{-- resources/views/mahasiswa/index.blade.php --}}
@extends('layout.home')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-8 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Selamat datang, Nama Mahasiswa</h5>
                <p class="card-text text-muted">
                    Ini adalah halaman dashboard mahasiswa.  
                    Kamu bisa melakukan absen, melihat jadwal kuliah, dan melihat profil.
                </p>
                <a href="{{ route('mhs.absen') }}" class="btn btn-primary btn-sm">Pergi ke Absen</a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6 class="card-title">Info Singkat</h6>
                <ul class="list-unstyled small mb-0">
                    <li>NIM: 2200001</li>
                    <li>Prodi: Teknik Ngoding</li>
                    <li>Semester: 4</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
