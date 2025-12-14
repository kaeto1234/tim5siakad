<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    protected $fillable = [
        'department_id',
        'code',
        'name',
    ];

    // StudyProgram belongs to a department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // StudyProgram has many students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // StudyProgram has many lecturers
    public function lecturers()
    {
        return $this->hasMany(Lecturer::class);
    }
}
