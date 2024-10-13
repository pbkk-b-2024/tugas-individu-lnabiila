<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sekolah extends Migration
{
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['perempuan', 'laki-laki']);
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->string('nama_ortu');
            $table->string('no_telp_ortu');
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['perempuan', 'laki-laki']);
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->string('foto')->nullable();
            $table->timestamps();
        });

        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('ruang', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('kapasitas');
            $table->timestamps();
        });

        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('ruang_id')->constrained('ruang')->onDelete('cascade');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();
        });

        Schema::create('siswa_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_kelas_id')->constrained('siswa_kelas')->onDelete('cascade');
            $table->integer('skor');
            $table->date('tanggal');
            $table->timestamps();
        });

        Schema::create('kehadiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_kelas_id')->constrained('siswa_kelas')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('status', ['hadir', 'absen', 'telat']);
            $table->timestamps();
        });

        Schema::create('kelas_guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained('guru')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kehadiran');
        Schema::dropIfExists('nilai');
        Schema::dropIfExists('siswa_kelas');
        Schema::dropIfExists('jadwal');
        Schema::dropIfExists('ruang');
        Schema::dropIfExists('kelas_guru');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('guru');
        Schema::dropIfExists('siswa');
    }
}