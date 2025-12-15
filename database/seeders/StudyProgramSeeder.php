<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
{
    public function run(): void
    {
        $ti = Department::where('code', 'TI')->first();
        $si = Department::where('code', 'SI')->first();
        $rpl = Department::where('code', 'RPL')->first();
        $now = now();

        StudyProgram::insert([
            [
                'code' => 'TRPL',
                'name' => 'Teknologi Rekayasa Perangkat Lunak',
                'department_id' => $rpl->id,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'MI',
                'name' => 'Manajemen Informatika',
                'department_id' => $ti->id,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'TK',
                'name' => 'Teknik Komputer',
                'department_id' => $ti->id,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'SI',
                'name' => 'Sistem Informasi',
                'department_id' => $si->id,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
