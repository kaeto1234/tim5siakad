<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\StudyProgram;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    public function run(): void
    {
        $studyPrograms = StudyProgram::all();

        if ($studyPrograms->isEmpty()) {
            $this->command->error('Study program belum ada');
            return;
        }

        $lecturers = [
            'NURIL FLUTTER',
            'AHMAD LARAVEL',
            'SITI DATABASE',
            'BUDI JARINGAN',
            'RINA UIUX',
        ];

        $nidnBase = 998700; // biar rapi

        foreach ($lecturers as $index => $name) {

            $nidn = $nidnBase + $index + 1;

            // USER
            $user = User::create([
                'name'     => $name,
                'email'    => strtolower(str_replace(' ', '', $name)) . '@dosen.ac.id',
                'password' => Hash::make($nidn),
                'role'     => 'lecturer',
            ]);

            // LECTURER
            Lecturer::create([
                'user_id'          => $user->id,
                'lecturer_number'  => $nidn,
                'name'             => $name,
                'study_program_id' => $studyPrograms->random()->id,
            ]);
        }
    }
}
