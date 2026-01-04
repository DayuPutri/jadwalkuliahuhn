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
    Schema::table('jadwals', function (Blueprint $table) {
        $table->enum('tipe_kelas', ['offline', 'online', 'hybrid'])->default('offline')->after('ruangan');
        $table->string('link_online')->nullable()->after('tipe_kelas');
    });
}

public function down(): void
{
    Schema::table('jadwals', function (Blueprint $table) {
        $table->dropColumn(['tipe_kelas', 'link_online']);
    });
}  
};
