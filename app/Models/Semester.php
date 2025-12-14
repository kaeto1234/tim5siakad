<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name',
        'academic_year',
        'is_active',
    ];

    // Semester has many schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
