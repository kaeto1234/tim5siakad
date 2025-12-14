@extends('layouts.admin')

@section('title', 'Data Mahasiswa')

@section('content')
<h4 class="mb-4">Data Mahasiswa</h4>

<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="col-md-4 px-0">
        <input type="text" class="form-control" placeholder="Cari mahasiswa...">
    </div>
    <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary">
        + Tambah Mahasiswa
    </a>
</div>

<table class="table table-bordered align-middle">
    <thead class="table-light">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Kelas</th>
            <th>Angkatan</th>
            <th width="120" class="text-center">Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($students as $student)
            @php
                $class = $student->classSemesters->first();
            @endphp
            <tr>
                <td>{{ $student->student_number }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->studyProgram->name ?? '-' }}</td>
                <td>
                    @if ($class)
                        {{ $class->level }}{{ $class->classRoom->name }}
                        ({{ $class->semester->name }})
                    @else
                        -
                    @endif
                </td>
                <td>{{ $student->enrollment_year }}</td>
                <td class="text-center">
                    <form action="{{ route('admin.mahasiswa.destroy', $student->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin hapus mahasiswa ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data mahasiswa belum ada
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
