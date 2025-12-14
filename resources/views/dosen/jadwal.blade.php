@extends('layouts.app')

@section('title', 'Jadwal Mengajar')

@section('content')
<h4 class="mb-4">Jadwal Mengajar</h4>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Mata Kuliah</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basis Data</td>
                    <td>TI-3A</td>
                    <td>Senin</td>
                    <td>08.00 - 10.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
