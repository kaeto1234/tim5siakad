<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    public function attendances() {
        return $this->hasMany(Attendance::class);
    }
}

