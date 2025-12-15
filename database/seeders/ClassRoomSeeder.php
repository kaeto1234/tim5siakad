<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassRoom;

class ClassRoomSeeder extends Seeder
{
    public function run(): void
    {
        $classes = ['A', 'B', 'C', 'D', 'E'];

        foreach ($classes as $class) {
            ClassRoom::create([
                'name'          => $class,
            ]);
        }
    }
}
