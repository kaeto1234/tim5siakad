<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Schedule;
use App\Models\Attendance;
use App\Models\Meeting;


class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = Schedule::with('classSemester.students')->get();

        foreach ($schedules as $schedule) {

            $students = $schedule->classSemester->students;

            foreach ($students as $student) {

                // ambil semua meeting jadwal ini
                $meetings = Meeting::where('schedule_id', $schedule->id)->get();

                if ($meetings->count() === 0) {
                    continue;
                }

                // hitung kehadiran
                $presentCount = Attendance::whereIn('meeting_id', $meetings->pluck('id'))
                    ->where('student_id', $student->id)
                    ->where('status', 'present')
                    ->count();

                $percentage = ($presentCount / $meetings->count()) * 100;

                // 🎯 TENTUKAN RANGE NILAI BERDASARKAN PRESENSI
                if ($percentage >= 80) {
                    $assignment = rand(80, 95);
                    $midterm    = rand(75, 90);
                    $finalExam  = rand(80, 95);
                } elseif ($percentage >= 65) {
                    $assignment = rand(65, 80);
                    $midterm    = rand(60, 75);
                    $finalExam  = rand(65, 80);
                } else {
                    $assignment = rand(40, 65);
                    $midterm    = rand(40, 60);
                    $finalExam  = rand(40, 60);
                }

                // hitung nilai akhir
                $finalScore = round(
                    ($assignment * 0.3) +
                    ($midterm * 0.3) +
                    ($finalExam * 0.4),
                    2
                );

                // huruf nilai
                $letter = match (true) {
                    $finalScore >= 85 => 'A',
                    $finalScore >= 75 => 'B',
                    $finalScore >= 65 => 'C',
                    $finalScore >= 50 => 'D',
                    default           => 'E',
                };

                Grade::create([
                    'student_id'        => $student->id,
                    'schedule_id'       => $schedule->id,
                    'assignment_score'  => $assignment,
                    'midterm_score'     => $midterm,
                    'final_exam_score'  => $finalExam,
                    'final_score'       => $finalScore,
                    'grade_letter'      => $letter,
                ]);
            }
        }
    }
}
