@extends('layouts.mahasiswa')

@section('title', 'Nilai Mahasiswa')

@section('content')
<h4 class="mb-4">Nilai Mahasiswa</h4>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>Id</th>
            <th>Mahasiswa_Id</th>
            <th>Jadwal_Id</th>
            <th>Nilai_Tugas</th>
            <th>Nilai_Uts</th>
            <th>Nilai_Uas</th>
            <th>Nilai_Akhir</th>
            <th style="width:120px" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>2023001</td>
            <td>JDW001</td>
            <td>80</td>
            <td>85</td>
            <td>90</td>
            <td>87</td>
            </td>
        </tr>
    </tbody>
</table>
@endsection