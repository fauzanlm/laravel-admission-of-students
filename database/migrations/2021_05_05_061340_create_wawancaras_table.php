<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWawancarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wawancaras', function (Blueprint $table) {
            $table->id();
            $table->string('id_soal');
            $table->string('nisn')->unique();
            $table->string('pertanyaan1')->nullable();
            $table->string('pertanyaan2')->nullable();
            $table->string('pertanyaan3')->nullable();
            $table->string('pertanyaan4')->nullable();
            $table->string('pertanyaan5')->nullable();
            $table->string('pertanyaan6')->nullable();
            $table->string('pertanyaan7')->nullable();
            $table->string('pertanyaan8')->nullable();
            $table->string('pertanyaan9')->nullable();
            $table->string('pertanyaan1ortu')->nullable();
            $table->string('pertanyaan2ortu')->nullable();
            $table->string('pertanyaan3ortu')->nullable();
            $table->string('pertanyaan4ortu')->nullable();
            $table->string('pertanyaan5ortu')->nullable();
            $table->string('pertanyaan6ortu')->nullable();
            $table->string('pertanyaan7ortu')->nullable();
            $table->string('pertanyaan8ortu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wawancaras');
    }
}
