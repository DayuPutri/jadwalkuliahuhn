<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class KelolaJadwalController extends Controller
{
    /**
     * Menampilkan semua jadwal dengan filter semester, search, dan pagination
     */
    public function index(Request $request)
{
    $search = $request->input('search');
    $semester = $request->input('semester');
    $perPage = $request->input('per_page', 10); // default 10
    $perPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

    $jadwals = Jadwal::query()
        ->when($search, function ($query, $search) {
            return $query->where('mata_kuliah', 'like', "%{$search}%")
                         ->orWhere('dosen', 'like', "%{$search}%")
                         ->orWhere('kelas', 'like', "%{$search}%")
                         ->orWhere('ruangan', 'like', "%{$search}%");
        })
        ->when($semester, function ($query, $semester) {
            return $query->where('semester', $semester);
        })
        ->orderBy('hari')
        ->orderBy('jam_mulai')
        ->paginate($perPage);

    $jadwals->appends(['search' => $search, 'semester' => $semester, 'per_page' => $perPage]);

    return view('admin.kelola-jadwal', compact('jadwals', 'search', 'semester', 'perPage'));
}

    /**
     * Menampilkan detail jadwal (opsional)
     */
    public function show(Jadwal $jadwal)
    {
        return view('admin.detail-jadwal', compact('jadwal'));
    }

    /**
     * Form edit jadwal
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin.edit-jadwal', compact('jadwal'));
    }

    /**
     * Update jadwal
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'dosen' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruangan' => 'required|string|max:100',
            'semester' => 'required|string|max:50',
            'sks' => 'required|integer|min:1|max:6',
            'tipe_kelas' => 'nullable|string|in:offline,online,hybrid',
            'link_online' => 'nullable|url',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('admin.kelola-jadwal')
            ->with('success', 'Jadwal berhasil diupdate!');
    }

    /**
     * Hapus jadwal
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('admin.kelola-jadwal')
            ->with('success', 'Jadwal berhasil dihapus!');
    }
}