<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'mata_kuliah_id',  // ganti jadi foreign key
        'dosen_id',        // ganti jadi foreign key
        'kelas_id',        // ganti jadi foreign key
        'ruang_id',        // ganti jadi foreign key
        'hari',
        'jam_mulai',
        'jam_selesai',
        'tipe_kelas',
        'link_online',
        'sks',
        'semester',
        'is_generated',
    ];

    protected $casts = [
        'jam_mulai' => 'datetime:H:i',
        'jam_selesai' => 'datetime:H:i',
        'is_generated' => 'boolean',
    ];

    // Relasi ke Mata Kuliah
    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    // Relasi ke Dosen (dapat nama & gelar)
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Relasi ke Ruang
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }
}