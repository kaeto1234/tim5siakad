<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwals')->onDelete('cascade');
            $table->foreignId('dosen_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['dibuka', 'ditutup'])->default('dibuka');
            $table->string('token', 64)->nullable();
            $table->dateTime('waktu_buka')->nullable();
            $table->dateTime('waktu_tutup')->nullable();
            $table->timestamps();

            $table->unique(['jadwal_id', 'tanggal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};