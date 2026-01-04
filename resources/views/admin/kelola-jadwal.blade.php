@extends('layouts.dashboard')

@section('title', 'Kelola Jadwal')

@section('content')
    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-7xl font-black text-blue-900 mb-20 text-center">KELOLA JADWAL</h1>

        <!-- Header: Tombol Tambah Jadwal & Back to Dashboard -->
        <div class="flex items-center justify-between mb-20">
            <div class="flex items-center gap-12">
                <a href="{{ route('admin.tambah-jadwal') }}" class="bg-green-600 hover:bg-green-700 text-white px-20 py-10 rounded-3xl text-4xl font-black shadow-2xl transition hover:-translate-y-4">
                    + Tambah Jadwal
                </a>
                <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-20 py-10 rounded-3xl text-4xl font-black shadow-2xl transition hover:-translate-y-4">
                    ← Back to Dashboard
                </a>
            </div>

            <!-- Pilihan Per Halaman & Pagination (diperbesar) -->
            <div class="flex items-center gap-12">
                <div class="flex items-center">
                    <label class="text-3xl font-black text-blue-900 mr-6">Tampilkan:</label>
                    <form method="GET" action="{{ route('admin.kelola-jadwal') }}" class="flex items-center">
                        @foreach(['search', 'semester'] as $param)
                            <input type="hidden" name="{{ $param }}" value="{{ request($param) }}">
                        @endforeach
                        <select name="per_page" onchange="this.form.submit()" class="px-12 py-8 text-3xl border-4 border-blue-300 rounded-3xl bg-white text-black font-bold">
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </form>
                    <span class="ml-6 text-3xl font-black text-blue-900">per halaman</span>
                </div>

                <div class="text-3xl">
                    {{ $jadwals->appends(request()->query())->links() }}
                </div>
            </div>
        </div>

        <!-- Search & Filter Semester (tulisan hitam) -->
        <div class="mb-20 flex flex-col items-center gap-12">
            <!-- Search -->
            <form method="GET" action="{{ route('admin.kelola-jadwal') }}" class="w-full max-w-2xl">
                @foreach(['semester', 'per_page'] as $param)
                    <input type="hidden" name="{{ $param }}" value="{{ request($param) }}">
                @endforeach
                <div class="flex">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari mata kuliah, dosen, kelas, ruangan..." 
                           class="flex-1 px-16 py-10 rounded-l-3xl border-4 border-blue-300 text-black text-3xl font-medium focus:outline-none focus:ring-8 focus:ring-blue-300">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-20 py-10 rounded-r-3xl text-4xl font-black shadow-xl transition">
                        🔍 Cari
                    </button>
                </div>
            </form>

            <!-- Filter Semester -->
            <div class="flex items-center">
                <label class="text-4xl font-black text-black mr-8">Filter Semester:</label>
                <form method="GET" action="{{ route('admin.kelola-jadwal') }}">
                    @foreach(['search', 'per_page'] as $param)
                        <input type="hidden" name="{{ $param }}" value="{{ request($param) }}">
                    @endforeach
                    <select name="semester" onchange="this.form.submit()" class="px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl bg-white text-black font-bold">
                        <option value="">Semua Semester</option>
                        <option value="Ganjil 2025/2026" {{ request('semester') == 'Ganjil 2025/2026' ? 'selected' : '' }}>Ganjil 2025/2026</option>
                        <option value="Genap 2025/2026" {{ request('semester') == 'Genap 2025/2026' ? 'selected' : '' }}>Genap 2025/2026</option>
                    </select>
                </form>

                @if(request('search') || request('semester'))
                    <a href="{{ route('admin.kelola-jadwal') }}" class="ml-12 bg-red-600 hover:bg-red-700 text-white px-20 py-10 rounded-3xl text-4xl font-black shadow-xl transition">
                        Reset Filter
                    </a>
                @endif
            </div>
        </div>

        <!-- Tabel Jadwal -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gradient-to-r from-blue-800 to-blue-900 text-white">
                        <tr>
                            <th class="py-12 px-16 text-center text-3xl font-black">No</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Mata Kuliah</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Dosen</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">SKS</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Kelas</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Semester</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Hari & Jam</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Ruangan</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Tipe Kelas</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Link Online</th>
                            <th class="py-12 px-16 text-center text-3xl font-black">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwals as $jadwal)
                            <tr class="border-b-4 border-gray-200 hover:bg-blue-50 transition">
                                <td class="py-12 px-16 text-center text-2xl font-medium">{{ $jadwals->firstItem() + $loop->index }}</td>
                                <td class="py-12 px-16 text-center text-2xl font-bold text-blue-900">{{ $jadwal->mata_kuliah }}</td>
                                <td class="py-12 px-16 text-center text-2xl">{{ $jadwal->dosen }}</td>
                                <td class="py-12 px-16 text-center text-2xl">{{ $jadwal->sks }}</td>
                                <td class="py-12 px-16 text-center text-2xl">{{ $jadwal->kelas }}</td>
                                <td class="py-12 px-16 text-center text-2xl">{{ $jadwal->semester }}</td>
                                <td class="py-12 px-16 text-center text-2xl">
                                    <div class="font-bold">{{ $jadwal->hari }}</div>
                                    <div>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</div>
                                </td>
                                <td class="py-12 px-16 text-center text-2xl">{{ $jadwal->ruangan }}</td>
                                <td class="py-12 px-16 text-center text-2xl capitalize">{{ $jadwal->tipe_kelas ?? 'offline' }}</td>
                                <td class="py-12 px-16 text-center text-2xl">
                                    @if($jadwal->link_online)
                                        <a href="{{ $jadwal->link_online }}" target="_blank" class="text-blue-600 underline hover:text-blue-800 font-bold">Buka Link</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="py-12 px-16 text-center">
                                    <div class="flex items-center justify-center space-x-8">
                                        <button onclick="showDetail({{ $jadwal->toJson() }})" class="bg-blue-600 hover:bg-blue-700 text-white px-16 py-8 rounded-3xl text-3xl font-black shadow-xl transition">
                                            Detail
                                        </button>
                                        <button onclick="showEdit({{ $jadwal->toJson() }})" class="bg-yellow-500 hover:bg-yellow-600 text-black px-16 py-8 rounded-3xl text-3xl font-black shadow-xl transition">
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.jadwal.destroy', $jadwal) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus jadwal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-16 py-8 rounded-3xl text-3xl font-black shadow-xl transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="py-32 text-center text-5xl font-bold text-gray-500">
                                    Tidak ada data jadwal ditemukan
                                    @if(request('search') || request('semester'))
                                        <br><a href="{{ route('admin.kelola-jadwal') }}" class="text-blue-600 underline mt-12 inline-block text-3xl font-bold">Bersihkan Filter</a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal Detail Jadwal (tulisan hitam besar) -->
        <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden flex items-center justify-center">
            <div class="bg-white rounded-3xl shadow-2xl p-20 max-w-4xl w-full">
                <h2 class="text-6xl font-black text-blue-900 mb-20 text-center">DETAIL JADWAL</h2>
                <div class="space-y-12 text-4xl text-black font-medium" id="detailContent"></div>
                <div class="text-center mt-20">
                    <button onclick="closeModal('detailModal')" class="bg-gray-600 hover:bg-gray-700 text-white px-32 py-12 rounded-3xl text-5xl font-black transition shadow-2xl">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Edit Jadwal (tulisan hitam besar) -->
        <div id="editModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden flex items-center justify-center">
            <div class="bg-white rounded-3xl shadow-2xl p-20 max-w-5xl w-full">
                <h2 class="text-6xl font-black text-blue-900 mb-20 text-center">EDIT JADWAL</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 text-black" id="editContent"></div>
                    <div class="text-center mt-20 space-x-16">
                        <button type="button" onclick="closeModal('editModal')" class="bg-gray-600 hover:bg-gray-700 text-white px-32 py-12 rounded-3xl text-5xl font-black transition shadow-2xl">
                            Batal
                        </button>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-32 py-12 rounded-3xl text-5xl font-black transition shadow-2xl">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function showDetail(jadwal) {
                const content = document.getElementById('detailContent');
                content.innerHTML = `
                    <p><strong class="font-black">Mata Kuliah:</strong> ${jadwal.mata_kuliah}</p>
                    <p><strong class="font-black">Dosen:</strong> ${jadwal.dosen}</p>
                    <p><strong class="font-black">SKS:</strong> ${jadwal.sks}</p>
                    <p><strong class="font-black">Kelas:</strong> ${jadwal.kelas}</p>
                    <p><strong class="font-black">Semester:</strong> ${jadwal.semester}</p>
                    <p><strong class="font-black">Hari:</strong> ${jadwal.hari}</p>
                    <p><strong class="font-black">Jam:</strong> ${jadwal.jam_mulai.substring(0,5)} - ${jadwal.jam_selesai.substring(0,5)}</p>
                    <p><strong class="font-black">Ruangan:</strong> ${jadwal.ruangan}</p>
                    <p><strong class="font-black">Tipe Kelas:</strong> ${jadwal.tipe_kelas || 'Offline'}</p>
                    <p><strong class="font-black">Link Online:</strong> ${jadwal.link_online ? '<a href="' + jadwal.link_online + '" target="_blank" class="text-blue-600 underline font-bold">Buka Link</a>' : '-'}</p>
                `;
                document.getElementById('detailModal').classList.remove('hidden');
            }

            function showEdit(jadwal) {
                const content = document.getElementById('editContent');
                document.getElementById('editForm').action = '/admin/jadwal/' + jadwal.id;

                content.innerHTML = `
                    <div>
                        <label class="block text-4xl font-black mb-8">Mata Kuliah</label>
                        <input type="text" name="mata_kuliah" value="${jadwal.mata_kuliah}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Dosen</label>
                        <input type="text" name="dosen" value="${jadwal.dosen}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">SKS</label>
                        <input type="number" name="sks" value="${jadwal.sks}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Kelas</label>
                        <input type="text" name="kelas" value="${jadwal.kelas}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Hari</label>
                        <input type="text" name="hari" value="${jadwal.hari}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Jam Mulai</label>
                        <input type="time" name="jam_mulai" value="${jadwal.jam_mulai.substring(0,5)}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Jam Selesai</label>
                        <input type="time" name="jam_selesai" value="${jadwal.jam_selesai.substring(0,5)}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Ruangan</label>
                        <input type="text" name="ruangan" value="${jadwal.ruangan}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-4xl font-black mb-8">Link Online</label>
                        <input type="url" name="link_online" value="${jadwal.link_online || ''}" class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                `;
                document.getElementById('editModal').classList.remove('hidden');
            }

            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }
        </script>
    </main>
@endsection