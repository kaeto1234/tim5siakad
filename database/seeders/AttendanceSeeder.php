<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meeting;
use App\Models\Attendance;

class AttendanceSeeder extends Seeder
{
    public function run(): void
    {
        $meetings = Meeting::with('schedule.classSemester')->get();

        foreach ($meetings as $meeting) {

            $classSemester = $meeting->schedule->classSemester;

            // ambil semua mahasiswa di kelas semester ini
            $students = $classSemester->students;

            foreach ($students as $student) {

                // probabilitas kehadiran
                $rand = rand(1, 100);

                if ($rand <= 75) {
                    $status = 'present';
                } elseif ($rand <= 90) {
                    $status = 'excused';
                } else {
                    $status = 'absent';
                }

                Attendance::create([
                    'meeting_id' => $meeting->id,
                    'student_id' => $student->id,
                    'status'     => $status,
                ]);
            }
        }
    }
}
