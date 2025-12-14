<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = [
        'name',
    ];

    // ClassRoom has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // ClassRoom has many schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
