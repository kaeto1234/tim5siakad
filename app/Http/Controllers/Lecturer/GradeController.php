<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Schedule;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * FORM INPUT NILAI
     */
    public function create(Schedule $schedule)
    {
        $classSemester = $schedule->classSemester;

        // mahasiswa di kelas tsb
        $students = $classSemester->students()
            ->orderBy('name')
            ->get();

        // nilai yang sudah ada (kalau edit)
        $grades = Grade::where('schedule_id', $schedule->id)
            ->get()
            ->keyBy('student_id');

        return view('dosen.nilai.create', compact(
            'schedule',
            'students',
            'grades'
        ));
    }

    /**
     * SIMPAN / UPDATE NILAI
     */
    public function store(Request $request, Schedule $schedule)
    {
        $request->validate([
            'grades' => 'required|array',
        ]);

        foreach ($request->grades as $studentId => $data) {

            $assignment = $data['assignment'] ?? 0;
            $midterm    = $data['midterm'] ?? 0;
            $finalExam  = $data['final_exam'] ?? 0;

            // hitung nilai akhir
            $finalScore = round(
                ($assignment * 0.3) +
                ($midterm * 0.3) +
                ($finalExam * 0.4),
                2
            );

            // tentukan huruf
            $letter = match (true) {
                $finalScore >= 85 => 'A',
                $finalScore >= 75 => 'B',
                $finalScore >= 65 => 'C',
                $finalScore >= 50 => 'D',
                default           => 'E',
            };

            Grade::updateOrCreate(
                [
                    'student_id'  => $studentId,
                    'schedule_id' => $schedule->id,
                ],
                [
                    'assignment_score' => $assignment,
                    'midterm_score'    => $midterm,
                    'final_exam_score' => $finalExam,
                    'final_score'      => $finalScore,
                    'grade_letter'     => $letter,
                ]
            );
        }

        return redirect()
            ->route('dosen.jadwal')
            ->with('success', 'Nilai berhasil disimpan');
    }
}
