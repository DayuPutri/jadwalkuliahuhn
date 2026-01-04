@extends('layouts.dashboard')

@section('title', 'Tambah Jadwal Baru')

@section('content')
    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-6xl font-extrabold text-blue-900 mb-20 text-center">TAMBAH JADWAL BARU</h1>

        <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-2xl p-20">
            <form method="POST" action="{{ route('admin.tambah-jadwal.store') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-32 gap-y-32">
                    <!-- Mata Kuliah -->
                    <!-- Mata Kuliah -->
                    <div>
    <label class="block text-3xl font-bold text-blue-900 mb-10">Semester</label>
    <select name="semester" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
        <option value="Ganjil 2025/2026">Ganjil 2025/2026</option>
        <option value="Genap 2025/2026">Genap 2025/2026</option>
    </select>
</div>
<!-- Mata Kuliah -->
<div class="md:col-span-2">
    <label class="block text-3xl font-bold text-blue-900 mb-10">Mata Kuliah</label>
    <div class="flex items-center space-x-8">
        <select name="mata_kuliah" id="matkul-select" required class="flex-1 px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400 transition h-auto">
            <option value="">-- Pilih atau Ketik Mata Kuliah --</option>
        </select>
        <button type="button" onclick="toggleNewInput('matkul')" class="bg-green-600 hover:bg-green-700 text-white w-20 h-20 rounded-2xl text-5xl font-bold shadow-2xl transition hover:scale-110 flex items-center justify-center flex-shrink-0">
            +
        </button>
    </div>
    <input type="text" id="new-matkul" placeholder="Ketik nama baru lalu tekan Enter..." class="hidden mt-8 w-full px-12 py-16 text-2xl border-4 border-green-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-green-400 transition">
</div>

<!-- Dosen -->
<div class="md:col-span-2">
    <label class="block text-3xl font-bold text-blue-900 mb-10">Dosen</label>
    <div class="flex items-center space-x-8">
        <select name="dosen" id="dosen-select" required class="flex-1 px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400 transition h-auto">
            <option value="">-- Pilih atau Ketik Nama Dosen --</option>
        </select>
        <button type="button" onclick="toggleNewInput('dosen')" class="bg-green-600 hover:bg-green-700 text-white w-20 h-20 rounded-2xl text-5xl font-bold shadow-2xl transition hover:scale-110 flex items-center justify-center flex-shrink-0">
            +
        </button>
    </div>
    <input type="text" id="new-dosen" placeholder="Ketik nama baru lalu tekan Enter..." class="hidden mt-8 w-full px-12 py-16 text-2xl border-4 border-green-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-green-400 transition">
</div>
<!--SKS -->
<div>
    <label class="block text-3xl font-bold text-blue-900 mb-10">SKS</label>
    <input type="number" name="sks" value="3" min="1" max="6" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
</div>

                    <!-- Kelas -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Kelas</label>
                        <select name="kelas" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400 transition h-auto">
                            <option value="">-- Pilih Kelas --</option>
                            <option>IF23A</option>
                        </select>
                    </div>

                    <!-- Hari -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Hari</label>
                        <select name="hari" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400 transition h-auto">
                            <option value="">-- Pilih Hari --</option>
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                        </select>
                    </div>

                    <!-- Jam Mulai -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Jam Mulai</label>
                        <input type="time" name="jam_mulai" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400 transition h-auto">
                    </div>

                    <!-- Jam Selesai -->
                    <div>
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Jam Selesai</label>
                        <input type="time" name="jam_selesai" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400 transition h-auto">
                    </div>

                    <!-- Ruangan -->
                    <div class="md:col-span-2">
                        <label class="block text-3xl font-bold text-blue-900 mb-10">Ruangan</label>
                        <select name="ruangan" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400 transition h-auto">
                            <option value="">-- Pilih Ruangan --</option>
                            <option>Kelas Denpasar</option>
                            <option>Lab Komputer Denpasar</option>
                        </select>
                    </div>
                </div>
                <!-- Tipe Kelas -->
<div>
    <label class="block text-3xl font-bold text-blue-900 mb-10">Tipe Kelas</label>
    <select name="tipe_kelas" required class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
        <option value="offline">Offline (Tatap Muka)</option>
        <option value="online">Online</option>
        <option value="hybrid">Hybrid (Campur)</option>
    </select>
</div>

<!-- Link Online (tampil kalau pilih Online/Hybrid) -->
<div class="md:col-span-2">
    <label class="block text-3xl font-bold text-blue-900 mb-10">Link Online (Zoom/Meet)</label>
    <input type="url" name="link_online" placeholder="https://zoom.us/j/..." class="w-full px-12 py-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-8 focus:ring-blue-400">
</div>

                <!-- Tombol Simpan Jadwal di Tengah Bawah -->
                <div class="flex justify-center mt-32">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-40 py-14 rounded-3xl text-4xl font-bold shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition duration-300">
                        Simpan Jadwal
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        function toggleNewInput(type) {
            const input = document.getElementById('new-' + type);
            input.classList.toggle('hidden');
            if (!input.classList.contains('hidden')) {
                input.value = '';
                input.focus();
            }
        }

        function editSelected(type) {
            const select = document.getElementById(type + '-select');
            const selectedValue = select.value;
            if (selectedValue && selectedValue !== '') {
                const input = document.getElementById('new-' + type);
                input.value = selectedValue;
                input.classList.remove('hidden');
                input.focus();
                input.select();
            }
        }

        // Perbaikan utama: saat Enter di input baru, otomatis select value di select
        document.getElementById('new-matkul').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const value = this.value.trim();
                if (value) {
                    const select = document.getElementById('matkul-select');
                    let found = false;
                    for (let option of select.options) {
                        if (option.value === value) {
                            option.selected = true;
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        const newOption = document.createElement('option');
                        newOption.value = value;
                        newOption.textContent = value;
                        newOption.selected = true;
                        select.appendChild(newOption);
                    }
                    this.value = '';
                    this.classList.add('hidden');
                }
            }
        });

        document.getElementById('new-dosen').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const value = this.value.trim();
                if (value) {
                    const select = document.getElementById('dosen-select');
                    let found = false;
                    for (let option of select.options) {
                        if (option.value === value) {
                            option.selected = true;
                            found = true;
                            break;
                        }
                    }
                    if (!found) {
                        const newOption = document.createElement('option');
                        newOption.value = value;
                        newOption.textContent = value;
                        newOption.selected = true;
                        select.appendChild(newOption);
                    }
                    this.value = '';
                    this.classList.add('hidden');
                }
            }
        });
    </script>
@endsection