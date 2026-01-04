<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama', 'sks', 'semester', 'dosen_id', 'kelas_id'];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}