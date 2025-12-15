<?php

namespace Database\Seeders;

use App\Models\ClassSemester;
use App\Models\Student;
use App\Models\StudentClassSemester;
use Illuminate\Database\Seeder;

class StudentClassSemesterSeeder extends Seeder
{
    public function run(): void
    {

        $students = Student::orderBy('id')->get();

        foreach ($students as $student) {

            // ambil class semester sesuai angkatan mahasiswa
            $classSemester = ClassSemester::where('batch', $student->enrollment_year)
                ->orderBy('id')
                ->first();

            if (! $classSemester) {
                continue;
            }

            StudentClassSemester::firstOrCreate([
                'student_id' => $student->id,
                'class_semester_id' => $classSemester->id,
            ]);
        }
    }
}
