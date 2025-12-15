<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {

        $rooms = [
            [
                'code' => 'R101',
                'name' => 'Ruang Kuliah 101',
                'capacity' => 40,
            ],
            [
                'code' => 'R102',
                'name' => 'Ruang Kuliah 102',
                'capacity' => 40,
            ],
            [
                'code' => 'R201',
                'name' => 'Ruang Kuliah 201',
                'capacity' => 40,
            ],
            [
                'code' => 'LAB-1',
                'name' => 'Laboratorium Komputer 1',
                'capacity' => 30,
            ],
            [
                'code' => 'LAB-2',
                'name' => 'Laboratorium Komputer 2',
                'capacity' => 40,
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
