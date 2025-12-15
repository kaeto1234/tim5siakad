<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        $semesters = [
            [
                'name' => 'Ganjil',
                'academic_year' => '2024/2025',
                'is_active' => true, // aktif sekarang
            ],
            [
                'name' => 'Genap',
                'academic_year' => '2024/2025',
                'is_active' => false,
            ],
            [
                'name' => 'Ganjil',
                'academic_year' => '2025/2026',
                'is_active' => false,
            ],
        ];

        foreach ($semesters as $semester) {
            Semester::create($semester);
        }
    }
}
