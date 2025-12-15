<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassRoom;
use App\Models\ClassSemester;
use App\Models\Semester;

class ClassSemesterSeeder extends Seeder
{
    public function run(): void
    {
        // ambil semester aktif
        $semester = Semester::where('is_active', true)->first();

        if (! $semester) {
            $this->command->error('Tidak ada semester aktif');
            return;
        }

        // ambil semua kelas (A, B, C, D, E)
        $classRooms = ClassRoom::orderBy('name')->get();

        $batch = 2024; // angkatan
        $level = 1;    // semester ke-1

        foreach ($classRooms as $classRoom) {
            ClassSemester::create([
                'class_room_id' => $classRoom->id,
                'semester_id'   => $semester->id,
                'batch'         => $batch,
                'level'         => $level,
                'capacity'      => 40,
            ]);
        }
    }
}
