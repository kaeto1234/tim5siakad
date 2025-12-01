<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->string('semester', 10)->nullable();
            $table->timestamps();

            $table->unique(['mahasiswa_id', 'kelas_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_kelas');
    }
};