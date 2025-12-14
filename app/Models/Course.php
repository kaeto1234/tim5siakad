<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'code',
        'name',
        'credits',
    ];

    // Course has many schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }


}
