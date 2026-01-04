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
        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom NIM kalau belum ada
            if (!Schema::hasColumn('users', 'nim')) {
                $table->string('nim')->unique()->nullable()->after('email');
            }

            // Tambah kolom role kalau belum ada
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['mahasiswa', 'dosen', 'admin'])
                      ->default('mahasiswa')
                      ->after('nim');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom nim (drop unique dulu kalau pakai MySQL)
            if (Schema::hasColumn('users', 'nim')) {
                $table->dropUnique(['nim']);
                $table->dropColumn('nim');
            }

            // Hapus kolom role
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};