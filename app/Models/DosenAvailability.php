<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenAvailability extends Model
{
    use HasFactory;

    protected $fillable = ['dosen_id', 'hari', 'jam_mulai', 'jam_selesai', 'tersedia'];

    protected $casts = [
        'jam_mulai' => 'datetime:H:i',
        'jam_selesai' => 'datetime:H:i',
        'tersedia' => 'boolean',
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}