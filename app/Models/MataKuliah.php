<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';
    protected $fillable = ['nama','kode','sks','deskripsi'];

    public function dosen()
    {
        return $this->belongsToMany(User::class, 'dosen_matakuliah', 'mata_kuliah_id', 'dosen_id');
    }
}
