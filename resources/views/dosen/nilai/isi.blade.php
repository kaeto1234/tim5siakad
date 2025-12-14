@extends('layouts.app')

@section('title', 'Input Nilai')

@section('content')
<h4 class="mb-4">Input Nilai Mahasiswa</h4>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>220101</td>
                    <td>Andi Saputra</td>
                    <td>
                        <input type="number" class="form-control" placeholder="0 - 100">
                    </td>
                </tr>
            </tbody>
        </table>

        <button class="btn btn-primary mt-3">
            Simpan Nilai
        </button>
    </div>
</div>
@endsection
