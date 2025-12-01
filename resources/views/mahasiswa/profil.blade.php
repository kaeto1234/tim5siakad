{{-- resources/views/mahasiswa/profil.blade.php --}}
@extends('layout.home')

@section('title', 'Profil Mahasiswa')

@section('content')
<div class="row">
    {{-- CARD IDENTITAS KIRI --}}
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <div class="rounded-circle bg-secondary mb-3"
                     style="width:100px;height:100px;margin:auto;"></div>
                <h5 class="card-title mb-0">Achmad Jefri Null</h5>
                <p class="text-muted small mb-0">NIM: 23410120015</p>
                <p class="text-muted small">
                    Prodi: Teknologi Rekayasa Perangkat Lunak
                </p>
            </div>
        </div>
    </div>

    {{-- CARD DATA PROFIL KANAN --}}
    <div class="col-md-8 mb-3">
        <div class="card shadow-sm">
            <div class="card-header">
                Data Profil Mahasiswa
            </div>
            <div class="card-body">

                {{-- DATA AKADEMIK --}}
                <h6 class="fw-bold mb-3">Data Akademik</h6>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Tingkat</div>
                    <div class="col-sm-8">2</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Paralel</div>
                    <div class="col-sm-8">E</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Status Mahasiswa</div>
                    <div class="col-sm-8">Aktif</div>
                </div>

                <hr>

                {{-- DATA PRIBADI --}}
                <h6 class="fw-bold mb-3">Data Pribadi</h6>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">TTL</div>
                    <div class="col-sm-8">Banyuwangi, 15 Mei 2004</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Jenis Kelamin</div>
                    <div class="col-sm-8">Laki-laki</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Agama</div>
                    <div class="col-sm-8">Islam</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Email</div>
                    <div class="col-sm-8">achmadjefrinull@gmail.com</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">No. HP</div>
                    <div class="col-sm-8">0812-3456-7890</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 text-muted">Alamat</div>
                    <div class="col-sm-8">
                        Jl. Mawar No. 12, Kec. Banyuwangi, Kab. Banyuwangi
                    </div>
                </div>

                <hr>
                <button class="btn btn-outline-primary btn-sm">Edit Profil</button>
            </div>
        </div>
    </div>
</div>
@endsection
