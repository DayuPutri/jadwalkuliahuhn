<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kode'];

    public function mahasiswas()
    {
        return $this->hasMany(User::class, 'jurusan_id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'jurusan_id');  // Tambah field jurusan_id di jadwal kalau perlu
    }
}