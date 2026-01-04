@extends('layouts.dashboard')

@section('title', 'Edit Jadwal')

@section('content')
    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-6xl font-extrabold text-blue-900 mb-20 text-center">EDIT JADWAL</h1>

        <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-2xl p-20">
            <form method="POST" action="{{ route('admin.jadwal.update', $jadwal) }}">
                @csrf
                @method('PATCH')

                <!-- Sama seperti form tambah, tapi value dari $jadwal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-32 gap-y-32">
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" value="{{ $jadwal->mata_kuliah }}" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl">
                    </div>
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Dosen</label>
                        <input type="text" name="dosen" value="{{ $jadwal->dosen }}" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl">
                    </div>
                    <!-- Kelas, Hari, Jam Mulai, Jam Selesai, Ruangan sama seperti tambah, value dari $jadwal -->
                    <!-- ... copy dari form tambah ... -->
                </div>

                <div class="flex justify-center mt-32">
                    <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-40 py-14 rounded-3xl text-4xl font-bold shadow-2xl transition">
                        Update Jadwal
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection