<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    // Tampilkan form tambah dosen
    public function create()
    {
        return view('admin.tambah-dosen');
    }

    // Simpan dosen baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gelar' => 'nullable|string|max:100',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'nip' => 'nullable|string|unique:dosens,nip',
            'agama' => 'nullable|string',
            'email' => 'required|email|unique:dosens,email',
            'handphone' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['foto'] = $filename;
        } else {
            $data['foto'] = 'default-avatar.png';
        }

        Dosen::create($data);

        return redirect()->route('admin.profile-dosen')->with('success', 'Dosen berhasil ditambahkan!');
    }

    // Tampilkan form edit dosen
    public function edit(Dosen $dosen)
    {
        return view('admin.edit-dosen', compact('dosen'));
    }

    // Update data dosen
    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gelar' => 'nullable|string|max:100',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'nip' => 'nullable|string|unique:dosens,nip,' . $dosen->id,
            'agama' => 'nullable|string',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'handphone' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau bukan default
            if ($dosen->foto && $dosen->foto != 'default-avatar.png') {
                $oldFotoPath = public_path('images/' . $dosen->foto);
                if (file_exists($oldFotoPath)) {
                    unlink($oldFotoPath);
                }
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['foto'] = $filename;
        }

        $dosen->update($data);

        return redirect()->route('admin.profile-dosen')->with('success', 'Dosen berhasil diupdate!');
    }

    // Hapus dosen
    public function destroy(Dosen $dosen)
    {
        // Hapus foto kalau bukan default
        if ($dosen->foto && $dosen->foto != 'default-avatar.png') {
            $fotoPath = public_path('images/' . $dosen->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $dosen->delete();

        return redirect()->route('admin.profile-dosen')->with('success', 'Dosen berhasil dihapus!');
    }
}