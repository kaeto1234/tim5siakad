<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            // ubah ke decimal (lebih realistis)
            $table->decimal('assignment_score', 5, 2)->change();
            $table->decimal('midterm_score', 5, 2)->change();
            $table->decimal('final_exam_score', 5, 2)->change();
            $table->decimal('final_score', 5, 2)->change();

            // huruf nilai
            $table->string('grade_letter', 2)->nullable()->after('final_score');

            // cegah duplikasi
            $table->unique(['student_id', 'schedule_id']);
        });
    }

    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->dropUnique(['student_id', 'schedule_id']);
            $table->dropColumn('grade_letter');
        });
    }
};

