<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $fillable = ['kelas_id','dosen_id','mata_kuliah_id','hari','jam_mulai','jam_selesai','ruang','semester','keterangan'];

    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function dosen() { return $this->belongsTo(User::class, 'dosen_id'); }
    public function mataKuliah() { return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id'); }
    public function presensi() { return $this->hasMany(Presensi::class, 'jadwal_id'); }
}
