{{-- resources/views/mahasiswa/absen.blade.php --}}
@extends('layout.home')

@section('title', 'Absen')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm mb-3">
            <div class="card-header">
                Absen Kehadiran Hari Ini
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Mata Kuliah:</strong> Pemrograman Web</p>
                <p class="mb-1"><strong>Dosen:</strong> HJ.Furiansyah Dipraja St.Mt</p>
                <p class="mb-3"><strong>Jam:</strong> 08.00 - 09.40</p>

                {{-- ini nanti bisa diganti form beneran ke route POST --}}
                <form>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Hadir</option>
                            <option>Izin</option>
                            <option>Sakit</option>
                            <option>Alpha</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan (opsional)</label>
                        <textarea class="form-control" rows="2"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Absen</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
