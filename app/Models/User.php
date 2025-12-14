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


    // (1) Mahasiswa ↔ Kelas (pivot mahasiswa_kelas)
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    // User → Lecturer (jika role = lecturer)
    public function lecturer()
    {
        return $this->hasOne(Lecturer::class);
    }
}
