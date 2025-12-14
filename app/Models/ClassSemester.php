<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSemester extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_room_id',
        'semester_id',
        'batch',
        'level',
    ];

    // relasi
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'student_class_semesters'
        );
    }
}
