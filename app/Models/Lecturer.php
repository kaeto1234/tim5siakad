<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'user_id','lecturer_number','name','study_program_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function studyProgram() {
        return $this->belongsTo(StudyProgram::class);
    }

    public function schedules() {
        return $this->hasMany(Schedule::class);
    }
}

