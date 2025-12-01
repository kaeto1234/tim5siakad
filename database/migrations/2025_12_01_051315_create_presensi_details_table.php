<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presensi_id')->constrained('presensis')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('waktu_presensi')->nullable();
            $table->enum('status', ['hadir', 'izin', 'alpha'])->default('hadir');
            $table->string('keterangan', 150)->nullable();
            $table->timestamps();

            $table->unique(['presensi_id', 'mahasiswa_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensi_details');
    }
};