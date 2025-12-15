<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Meeting;
use Carbon\Carbon;

class MeetingSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = Schedule::with('classSemester.semester')->get();

        foreach ($schedules as $schedule) {

            $semester = $schedule->classSemester->semester;

            // 📌 tentukan awal semester MANUAL
            if ($semester->name === 'Ganjil') {
                $startDate = Carbon::createFromDate(
                    explode('/', $semester->academic_year)[0],
                    9, // September
                    1
                );
            } else {
                $startDate = Carbon::createFromDate(
                    explode('/', $semester->academic_year)[1],
                    2, // Februari
                    1
                );
            }

            // 📌 16 pertemuan (UTS & UAS tetap ADA presensi)
            for ($i = 1; $i <= 16; $i++) {
                Meeting::create([
                    'schedule_id'    => $schedule->id,
                    'meeting_number' => $i,
                    'date'           => $startDate->copy()->addWeeks($i - 1),
                    'topic'          => match (true) {
                        $i === 8  => 'Ujian Tengah Semester',
                        $i === 16 => 'Ujian Akhir Semester',
                        default  => "Pertemuan ke-$i",
                    },
                ]);
            }
        }
    }
}
