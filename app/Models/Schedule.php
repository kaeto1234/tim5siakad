<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function classSemester() {
        return $this->belongsTo(ClassSemester::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function lecturer() {
        return $this->belongsTo(Lecturer::class);
    }

    public function meetings() {
        return $this->hasMany(Meeting::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }
}

