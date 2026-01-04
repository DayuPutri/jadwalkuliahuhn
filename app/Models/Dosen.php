<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    /**
     * Nama table di database
     */
    protected $table = 'dosens';

    /**
     * Kolom yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'nama',
        'gelar',
        'tempat_lahir',
        'tanggal_lahir',
        'nip',
        'agama',
        'email',
        'handphone',
        'foto',
    ];

    /**
     * Kolom yang harus di-cast ke tipe tertentu
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Default value untuk kolom foto kalau kosong
     */
    protected $attributes = [
        'foto' => 'default-avatar.png',
    ];
}