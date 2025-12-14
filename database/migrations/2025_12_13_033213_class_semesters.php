<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_semesters', function (Blueprint $table) {
            $table->id();

            $table->foreignId('class_room_id')
                ->constrained('class_rooms')
                ->cascadeOnDelete();

            $table->foreignId('semester_id')
                ->constrained('semesters')
                ->cascadeOnDelete();

            $table->year('batch');        // angkatan (2022, 2023, dst)
            $table->unsignedTinyInteger('level'); // semester ke (1–8)

            $table->timestamps();

            // 🔒 unik: kelas + semester + angkatan
            $table->unique(
                ['class_room_id', 'semester_id', 'batch'],
                'class_semester_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_semesters');
    }
};
