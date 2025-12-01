<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi' ?: 'presensis'; // jika kamu pakai presensi/presensis, sesuaikan
    protected $fillable = ['jadwal_id','dosen_id','tanggal','status','token','waktu_buka','waktu_tutup'];

    public function jadwal() { return $this->belongsTo(Jadwal::class); }
    public function details() { return $this->hasMany(PresensiDetail::class, 'presensi_id'); }
}
