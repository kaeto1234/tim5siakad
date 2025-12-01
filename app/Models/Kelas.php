<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama','kode','kapasitas','deskripsi'];

    public function mahasiswa()
    {
        return $this->belongsToMany(User::class, 'mahasiswa_kelas', 'kelas_id', 'mahasiswa_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kelas_id');
    }
}

