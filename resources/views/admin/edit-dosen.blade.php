@extends('layouts.dashboard')

@section('title', 'Edit Dosen')

@section('content')
    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-6xl font-extrabold text-blue-900 mb-20 text-center">EDIT DOSEN</h1>

        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl p-20">
            <form method="POST" action="{{ route('dosen.update', $dosen) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Isi form sama seperti tambah-dosen.blade.php, tapi value dari $dosen -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-20">
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ $dosen->nama }}" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl">
                    </div>
                    <!-- ... kolom lain sama, value="{{ $dosen->xxx }}" -->
                </div>

                <div class="text-center mt-32">
                    <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-40 py-16 rounded-3xl text-5xl font-extrabold shadow-2xl hover:shadow-3xl transition hover:scale-105">
                        UPDATE DOSEN
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection