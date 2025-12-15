<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            // Semester 1
            ['code' => 'MK001', 'name' => 'Matematika Dasar', 'credits' => 3],
            ['code' => 'MK002', 'name' => 'Algoritma dan Pemrograman', 'credits' => 4],
            ['code' => 'MK003', 'name' => 'Pengantar Teknologi Informasi', 'credits' => 2],
            ['code' => 'MK004', 'name' => 'Logika Informatika', 'credits' => 2],

            // Semester 2
            ['code' => 'MK005', 'name' => 'Struktur Data', 'credits' => 4],
            ['code' => 'MK006', 'name' => 'Basis Data', 'credits' => 4],
            ['code' => 'MK007', 'name' => 'Pemrograman Web', 'credits' => 3],

            // Semester 3
            ['code' => 'MK008', 'name' => 'Pemrograman Berorientasi Objek', 'credits' => 4],
            ['code' => 'MK009', 'name' => 'Rekayasa Perangkat Lunak', 'credits' => 3],
            ['code' => 'MK010', 'name' => 'Sistem Operasi', 'credits' => 3],

            // Semester 4
            ['code' => 'MK011', 'name' => 'Pemrograman Mobile', 'credits' => 3],
            ['code' => 'MK012', 'name' => 'Keamanan Sistem Informasi', 'credits' => 3],
        ];

        foreach ($courses as $course) {
            Course::create($course);
            
        }
    }
}
