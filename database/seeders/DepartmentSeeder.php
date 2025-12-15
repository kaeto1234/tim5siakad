<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
         $now = now();

        Department::insert([
            [
                'code'          => 'TI',
                'name'          => 'Teknologi Informasi',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'code'          => 'SI',
                'name'          => 'Sistem Informasi',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'code'          => 'RPL',
                'name'          => 'Rekayasa Perangkat Lunak',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ]);
    }
}
