<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\StudyProgram;
use App\Models\ClassSemester;
use App\Models\StudentClassSemester;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $studyProgram = StudyProgram::first();

        if (! $studyProgram) {
            $this->command->error('Study program belum ada');
            return;
        }

        // ambil semua kelas semester aktif (angkatan 2024, level 1)
        $classSemesters = ClassSemester::where('batch', 2024)
            ->where('level', 1)
            ->orderBy('class_room_id')
            ->get();

        if ($classSemesters->isEmpty()) {
            $this->command->error('Class semester belum ada');
            return;
        }

        $totalStudents = 120;
        $currentClassIndex = 0;
        $currentCountInClass = 0;

        for ($i = 1; $i <= $totalStudents; $i++) {

            // pindah kelas tiap 40 mahasiswa
            if ($currentCountInClass >= 40) {
                $currentClassIndex++;
                $currentCountInClass = 0;
            }

            if (! isset($classSemesters[$currentClassIndex])) {
                break;
            }

            $classSemester = $classSemesters[$currentClassIndex];

            // NIM: IF2024001
            $nim = $studyProgram->code
                . '2024'
                . str_pad($i, 3, '0', STR_PAD_LEFT);

            // USER
            $user = User::create([
                'name'     => "Mahasiswa $i",
                'email'    => "mahasiswa$i@mail.com",
                'password' => Hash::make($nim),
                'role'     => 'student',
            ]);

            // STUDENT
            $student = Student::create([
                'user_id'          => $user->id,
                'student_number'   => $nim,
                'name'             => "Mahasiswa $i",
                'study_program_id' => $studyProgram->id,
                'enrollment_year'  => '2024',
            ]);

            // RELASI KELAS SEMESTER
            StudentClassSemester::create([
                'student_id'        => $student->id,
                'class_semester_id' => $classSemester->id,
            ]);

            $currentCountInClass++;
        }
    }
}
