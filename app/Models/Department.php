<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'code',
        'name',
    ];

    // Department has many study programs
    public function studyPrograms()
    {
        return $this->hasMany(StudyProgram::class);
    }
}
