<aside class="w-80 bg-gradient-to-b from-purple-800 to-purple-900 text-white flex flex-col shadow-2xl">
    <div class="p-12 text-center border-b border-purple-700">
        <img src="{{ asset('images/logo-uhn.jpeg') }}" alt="Logo UHN" class="w-48 mx-auto rounded-full shadow-2xl border-8 border-white">
        <h2 class="mt-8 text-3xl font-bold">Panel Mahasiswa</h2>
        <p class="text-purple-200 text-xl mt-2">UHN Denpasar</p>
    </div>

    <nav class="flex-1 px-12 py-20 space-y-12">
    
        <a href="{{ route('mahasiswa.dashboard') }}" 
           class="flex items-center py-8 px-10 rounded-3xl bg-purple-700 hover:bg-purple-600 transition text-2xl font-bold">
            <span class="mr-8 text-5xl">🏠</span> Dashboard
            <a href="{{ route('mahasiswa.jadwal') }}" 
   class="flex items-center py-8 px-10 rounded-3xl hover:bg-purple-700 transition text-2xl font-bold">
    <span class="mr-8 text-5xl">📅</span> Jadwal Kuliah
</a>

        </a>
        <a href="{{ route('mahasiswa.tugas') }}" 
           class="flex items-center py-8 px-10 rounded-3xl hover:bg-purple-700 transition text-2xl font-bold">
            <span class="mr-8 text-5xl">📝</span> Tugas
        </a>
        <a href="{{ route('mahasiswa.nilai') }}" 
           class="flex items-center py-8 px-10 rounded-3xl hover:bg-purple-700 transition text-2xl font-bold">
            <span class="mr-8 text-5xl">⭐</span> Nilai
        </a>
        
    </nav>

    <div class="px-12 pb-20">
        <div class="text-center mb-12">
            <p class="text-3xl font-bold">{{ Auth::user()->name ?? 'Mahasiswa' }}</p>
            <p class="text-purple-200 text-xl">NIM: {{ Auth::user()->email }}</p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center py-8 px-10 bg-red-600 hover:bg-red-700 rounded-3xl text-2xl font-bold transition">
                <span class="mr-8 text-5xl">🚪</span> Logout
            </button>
        </form>
    </div>
</aside>