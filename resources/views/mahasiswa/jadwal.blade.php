{{-- resources/views/mahasiswa/jadwal.blade.php --}}
@extends('layout.home')

@section('title', 'Jadwal Kuliah')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        Jadwal Mata kuliah 
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Mata Kuliah</th>
                        <th>Ruang</th>
                        <th>Dosen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Senin</td>
                        <td>08.00 - 09.40</td>
                        <td>Pemrograman Web</td>
                        <td>R.301</td>
                        <td>HJ.Furiansyah Dipraja St.Mt</td>
                    </tr>
                    <tr>
                        <td>Selasa</td>
                        <td>10.00 - 11.40</td>
                        <td>Basis Data</td>
                        <td>R.202</td>
                        <td>bu eka mistiko </td>
                    </tr>
                    {{-- tambah baris lain terserah tim kamu --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
