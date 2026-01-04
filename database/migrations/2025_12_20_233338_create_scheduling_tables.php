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
        // Cek & buat tabel kelas kalau belum ada
        if (!Schema::hasTable('kelas')) {
            Schema::create('kelas', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->integer('jumlah_mahasiswa');
                $table->timestamps();
            });
        }

        // Cek & buat tabel ruang kalau belum ada
        if (!Schema::hasTable('ruang')) {
            Schema::create('ruang', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->integer('kapasitas');
                $table->timestamps();
            });
        }

        // Cek & buat tabel mata_kuliah kalau belum ada
        if (!Schema::hasTable('mata_kuliah')) {
            Schema::create('mata_kuliah', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('kode');
                $table->integer('sks');
                $table->timestamps();
            });
        }

        // Cek & buat tabel jadwal kalau belum ada
        if (!Schema::hasTable('jadwal')) {
            Schema::create('jadwal', function (Blueprint $table) {
                $table->id();
                $table->foreignId('mata_kuliah_id')->constrained()->onDelete('cascade');
                $table->foreignId('dosen_id')->constrained()->onDelete('cascade');
                $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
                $table->foreignId('ruang_id')->constrained('ruang')->onDelete('cascade');
                $table->string('hari');
                $table->time('jam_mulai');
                $table->time('jam_selesai');
                $table->timestamps();
            });
        }

        // Cek & buat tabel dosen_availabilities kalau belum ada
        if (!Schema::hasTable('dosen_availabilities')) {
            Schema::create('dosen_availabilities', function (Blueprint $table) {
                $table->id();
                $table->foreignId('dosen_id')->constrained()->onDelete('cascade');
                $table->string('hari');
                $table->time('jam_mulai');
                $table->time('jam_selesai');
                $table->boolean('tersedia')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_availabilities');
        Schema::dropIfExists('jadwal');
        Schema::dropIfExists('mata_kuliah');
        Schema::dropIfExists('ruang');
        Schema::dropIfExists('kelas');
    }
};