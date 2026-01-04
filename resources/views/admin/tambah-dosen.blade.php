@extends('layouts.dashboard')

@section('title', 'Tambah Dosen Baru')

@section('content')
    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-6xl font-extrabold text-blue-900 mb-20 text-center">TAMBAH DOSEN BARU</h1>

        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl p-20">
            <form method="POST" action="{{ route('admin.tambah-dosen.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Nama Lengkap</label>
                        <input type="text" name="nama" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                    </div>

                    <!-- Gelar -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Gelar</label>
                        <input type="text" name="gelar" placeholder="S.Kom., M.Kom" class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                    </div>

                    <!-- Tempat Lahir -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                    </div>

                    <!-- NIP -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">NIP</label>
                        <input type="text" name="nip" class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                    </div>

                    <!-- Agama -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Agama</label>
                        <select name="agama" class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                            <option value="">-- Pilih Agama --</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Email</label>
                        <input type="email" name="email" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                    </div>

                    <!-- Handphone -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Handphone/WA</label>
                        <input type="text" name="handphone" class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
                    </div>

                    <!-- Foto Profil -->
                    <div class="md:col-span-2">
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Foto Profil</label>
                        <input type="file" name="foto" accept="image/*" class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl file:mr-8 file:py-8 file:px-16 file:rounded-3xl file:border-0 file:text-2xl file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                        <p class="text-xl text-gray-600 mt-8">Kosongkan jika ingin pakai foto default</p>
                    </div>
                </div>

                <!-- Tombol Simpan -->
                <div class="text-center mt-32">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-40 py-16 rounded-3xl text-5xl font-extrabold shadow-2xl hover:shadow-3xl transition hover:scale-105">
                        SIMPAN DOSEN
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection