<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('kode', 20)->nullable();
            $table->unsignedInteger('kapasitas')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->unique(['kode']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
