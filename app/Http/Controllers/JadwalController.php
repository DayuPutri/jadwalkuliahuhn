<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Ruangan;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['mataKuliah', 'dosen', 'kelas', 'ruangan'])->paginate(10);
        return view('admin.jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $mataKuliah = MataKuliah::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        return view('admin.jadwal.create', compact('mataKuliah', 'dosen', 'kelas', 'ruangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'dosen_id' => 'required|exists:dosens,id',
            'kelas_id' => 'required|exists:kelas,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'hari' => 'required|string',
            'jam' => 'required|string',
        ]);

        Jadwal::create($request->all());
        return redirect('/admin/dashboard')->with('success', 'Jadwal ditambahkan!');
    }

    public function show(Jadwal $jadwal)
    {
        $jadwal->load(['mataKuliah', 'dosen', 'kelas', 'ruangan']);
        return view('admin.jadwal.show', compact('jadwal'));
    }

    public function edit(Jadwal $jadwal)
    {
        $mataKuliah = MataKuliah::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();
        return view('admin.jadwal.edit', compact('jadwal', 'mataKuliah', 'dosen', 'kelas', 'ruangan'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'dosen_id' => 'required|exists:dosens,id',
            'kelas_id' => 'required|exists:kelas,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'hari' => 'required|string',
            'jam' => 'required|string',
        ]);

        $jadwal->update($request->all());
        return redirect('/admin/dashboard')->with('success', 'Jadwal diperbarui!');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect('/admin/dashboard')->with('success', 'Jadwal dihapus!');
    }

    // Tambah method ini di sini (akhir class, sebelum })
    public function mahasiswaIndex()
    {
        $jadwals = Jadwal::with(['mataKuliah', 'dosen', 'kelas', 'ruangan'])->paginate(10);
        return view('mahasiswa.jadwal', compact('jadwals'));
    }
    public function dosenIndex()
{
    $jadwals = Jadwal::where('dosen_id', Auth::user()->id)->with(['mataKuliah', 'ruangan'])->paginate(10);  // Filter by dosen
    return view('dosen.jadwal', compact('jadwals'));
}
}