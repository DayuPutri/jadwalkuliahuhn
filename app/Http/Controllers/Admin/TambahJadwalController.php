<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class TambahJadwalController extends Controller
{
    public function create()
    {
        return view('admin.tambah-jadwal');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah' => 'required|string',
            'dosen' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
            'ruangan' => 'required|string',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.kelola-jadwal')
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }
}