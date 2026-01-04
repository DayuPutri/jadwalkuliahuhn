@extends('layouts.dashboard')

@section('title', 'Profil Dosen')

@section('content')
    <main class="flex-1 p-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <h1 class="text-7xl font-black text-blue-900 mb-20 text-center">PROFIL DOSEN</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">
            @forelse($dosens as $dosen)
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden hover:shadow-3xl transition transform hover:-translate-y-4">
                    <!-- Foto Dosen -->
                    <div class="h-96 bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                        @if($dosen->foto && file_exists(public_path('images/' . $dosen->foto)))
                            <img src="{{ asset('images/' . $dosen->foto) }}" 
                                 alt="Foto {{ $dosen->nama }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                <span class="text-6xl font-black text-gray-500">No Foto</span>
                            </div>
                        @endif
                    </div>

                    <!-- Info Dosen -->
                    <div class="p-16 text-center">
                        <h3 class="text-5xl font-black text-blue-900 mb-6">{{ $dosen->nama }}</h3>
                        <p class="text-4xl font-bold text-gray-700 mb-12">{{ $dosen->gelar ?? '-' }}</p>
                        <p class="text-3xl text-gray-600 mb-4">{{ $dosen->email }}</p>
                        <p class="text-3xl text-gray-600 mb-16">{{ $dosen->handphone ?? '-' }}</p>

                        <!-- Tombol Edit & Hapus (tulisan hitam besar) -->
                        <div class="flex justify-center space-x-16">
                            <button onclick="showEdit({{ $dosen->toJson() }})" 
                                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-24 py-10 rounded-3xl text-4xl font-black shadow-xl transition">
                                Edit
                            </button>
                            <button onclick="showDelete({{ $dosen->id }}, '{{ addslashes($dosen->nama) }}')" 
                                    class="bg-red-600 hover:bg-red-700 text-black px-24 py-10 rounded-3xl text-4xl font-black shadow-xl transition">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-40">
                    <p class="text-6xl font-bold text-gray-500">Belum ada data dosen</p>
                </div>
            @endforelse
        </div>

        <!-- Modal Edit Dosen -->
        <div id="editModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden flex items-center justify-center">
            <div class="bg-white rounded-3xl shadow-2xl p-20 max-w-4xl w-full">
                <h2 class="text-6xl font-black text-blue-900 mb-20 text-center">EDIT PROFIL DOSEN</h2>
                <form id="editForm" method="POST" enctype="multipart/form-data">
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

        <!-- Modal Hapus Konfirmasi -->
        <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 hidden flex items-center justify-center">
            <div class="bg-white rounded-3xl shadow-2xl p-20 max-w-2xl w-full text-center">
                <h2 class="text-5xl font-black text-red-600 mb-12">HAPUS DOSEN?</h2>
                <p class="text-4xl text-black mb-16">Yakin hapus dosen <span id="deleteName" class="font-black"></span>?</p>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <div class="space-x-16">
                        <button type="button" onclick="closeModal('deleteModal')" class="bg-gray-600 hover:bg-gray-700 text-white px-32 py-12 rounded-3xl text-5xl font-black transition shadow-2xl">
                            Batal
                        </button>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-32 py-12 rounded-3xl text-5xl font-black transition shadow-2xl">
                            Ya, Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function showEdit(dosen) {
                const content = document.getElementById('editContent');
                document.getElementById('editForm').action = '/admin/dosen/' + dosen.id;

                content.innerHTML = `
                    <div>
                        <label class="block text-4xl font-black mb-8">Nama</label>
                        <input type="text" name="nama" value="${dosen.nama}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Gelar</label>
                        <input type="text" name="gelar" value="${dosen.gelar || ''}" class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Email</label>
                        <input type="email" name="email" value="${dosen.email}" required class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div>
                        <label class="block text-4xl font-black mb-8">Handphone</label>
                        <input type="text" name="handphone" value="${dosen.handphone || ''}" class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-4xl font-black mb-8">Foto Saat Ini</label>
                        <img src="{{ asset('images/') }}${dosen.foto}" alt="Foto saat ini" class="w-96 mx-auto rounded-2xl shadow-xl mb-8 object-cover">
                        <label class="block text-4xl font-black mb-8">Ganti Foto</label>
                        <input type="file" name="foto" accept="image/*" class="w-full px-16 py-10 text-3xl border-4 border-blue-300 rounded-3xl text-black file:mr-8 file:py-6 file:px-12 file:rounded-3xl file:border-0 file:text-3xl file:font-bold file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                    </div>
                `;
                document.getElementById('editModal').classList.remove('hidden');
            }

            function showDelete(id, nama) {
                document.getElementById('deleteName').textContent = nama;
                document.getElementById('deleteForm').action = '/admin/dosen/' + id;
                document.getElementById('deleteModal').classList.remove('hidden');
            }

            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }
        </script>
    </main>
@endsection