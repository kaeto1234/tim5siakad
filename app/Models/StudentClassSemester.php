<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClassSemester extends Model
{
    protected $fillable = [
        'student_id',
        'class_semester_id',
    ];

    // relasi ke mahasiswa
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // relasi ke kelas semester
    public function classSemester()
    {
        return $this->belongsTo(ClassSemester::class);
    }
}
