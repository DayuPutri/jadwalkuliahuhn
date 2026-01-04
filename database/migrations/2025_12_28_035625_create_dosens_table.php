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
        // Cek dulu apakah tabel 'dosens' sudah ada
        if (!Schema::hasTable('dosens')) {
            Schema::create('dosens', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('gelar')->nullable();
                $table->string('tempat_lahir')->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->string('nip')->unique()->nullable();
                $table->string('agama')->nullable();
                $table->string('email')->unique(); // email unik untuk login
                $table->string('handphone')->nullable();
                $table->string('foto')->default('default-avatar.png');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};