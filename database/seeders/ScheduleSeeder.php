<?php

namespace Database\Seeders;

use App\Models\ClassSemester;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $classSemesters = ClassSemester::all();
        $courses = Course::all();
        $lecturers = Lecturer::all();
        $rooms = Room::all();

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        $timeSlots = [
            ['08:00', '09:40'],
            ['10:00', '11:40'],
            ['13:00', '14:40'],
            ['15:00', '16:40'],
        ];

        foreach ($classSemesters as $classSemester) {

            $courseIndex = 0;

            foreach ($courses->take(4) as $course) {
                $day = $days[$courseIndex % count($days)];
                $time = $timeSlots[$courseIndex % count($timeSlots)];

                Schedule::create([
                    'class_semester_id' => $classSemester->id,
                    'course_id' => $course->id,
                    'lecturer_id' => $lecturers[$courseIndex % $lecturers->count()]->id,
                    'room_id' => $rooms[$courseIndex % $rooms->count()]->id,
                    'day' => $day,
                    'start_time' => $time[0],
                    'end_time' => $time[1],
                ]);

                $courseIndex++;
            }
        }
    }
}
