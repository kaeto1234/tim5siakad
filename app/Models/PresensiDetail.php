<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PresensiDetail extends Model
{
    protected $table = 'presensi_details';
    protected $fillable = ['presensi_id','mahasiswa_id','waktu_presensi','status','keterangan'];

    public function presensi() { return $this->belongsTo(Presensi::class, 'presensi_id'); }
    public function mahasiswa() { return $this->belongsTo(User::class, 'mahasiswa_id'); }
}
