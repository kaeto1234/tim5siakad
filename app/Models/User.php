<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI USER
    |--------------------------------------------------------------------------
    */

    // (1) Mahasiswa ↔ Kelas (pivot mahasiswa_kelas)
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'mahasiswa_kelas', 'mahasiswa_id', 'kelas_id');
    }

    // (2) Dosen ↔ Mata Kuliah (pivot dosen_matakuliah)
    public function matakuliahDosen()
    {
        return $this->belongsToMany(MataKuliah::class, 'dosen_matakuliah', 'dosen_id', 'mata_kuliah_id');
    }

    // (3) Dosen mengampu banyak jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'dosen_id');
    }
}
