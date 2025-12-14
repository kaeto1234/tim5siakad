<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'class_semester_id',
        'course_id',
        'lecturer_id',
        'room_id',
        'day',
        'start_time',
        'end_time',
    ];

    public function classSemester()
    {
        return $this->belongsTo(ClassSemester::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
