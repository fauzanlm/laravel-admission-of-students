<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('name');
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('asal_sekolah');
            $table->string('agama');
            $table->string('jurusan');
            $table->string('tahun_lulus');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('jk');
            $table->enum('tes', ['sudah', 'belum'])->default('belum');
            $table->enum('status', ['diterima','ditolak' , 'belum', 'diverifikasi'])->default('belum');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->enum('role', ['user','admin'])->default('user');
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
        Schema::dropIfExists('users');
    }
}
