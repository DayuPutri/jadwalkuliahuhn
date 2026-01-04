<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan'; // optional, karena Laravel otomatis pakai jamak

    protected $fillable = ['nama', 'kapasitas'];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}