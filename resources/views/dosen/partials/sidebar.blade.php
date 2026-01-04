<aside class="w-80 bg-gradient-to-b from-green-800 to-green-900 text-white flex flex-col shadow-2xl">
    <div class="p-12 text-center border-b border-green-700">
        <img src="{{ asset('images/logo-uhn.jpeg') }}" alt="Logo UHN" class="w-48 mx-auto rounded-full shadow-2xl border-8 border-white">
        <h2 class="mt-8 text-3xl font-bold">Panel Dosen</h2>
        <p class="text-green-200 text-xl mt-2">UHN Denpasar</p>
    </div>

    <nav class="flex-1 px-12 py-20 space-y-12">
        <a href="{{ route('dosen.dashboard') }}" 
           class="flex items-center py-8 px-10 rounded-3xl transition text-2xl font-bold {{ request()->routeIs('dosen.dashboard') ? 'bg-green-600 ring-8 ring-yellow-400' : 'bg-green-700 hover:bg-green-600' }}">
            <span class="mr-8 text-5xl">🏠</span> Dashboard Dosen
        </a>
        <a href="{{ route('dosen.jadwal-mengajar') }}" 
           class="flex items-center py-8 px-10 rounded-3xl transition text-2xl font-bold {{ request()->routeIs('dosen.jadwal-mengajar') ? 'bg-green-600 ring-8 ring-yellow-400' : 'bg-green-700 hover:bg-green-600' }}">
            <span class="mr-8 text-5xl">📅</span> Jadwal Mengajar
        </a>
        <a href="{{ route('dosen.tugas') }}" 
           class="flex items-center py-8 px-10 rounded-3xl transition text-2xl font-bold {{ request()->routeIs('dosen.tugas') ? 'bg-green-600 ring-8 ring-yellow-400' : 'bg-green-700 hover:bg-green-600' }}">
            <span class="mr-8 text-5xl">📝</span> Tugas
        </a>
        <a href="{{ route('dosen.nilai') }}" 
           class="flex items-center py-8 px-10 rounded-3xl transition text-2xl font-bold {{ request()->routeIs('dosen.nilai') ? 'bg-green-600 ring-8 ring-yellow-400' : 'bg-green-700 hover:bg-green-600' }}">
            <span class="mr-8 text-5xl">⭐</span> Nilai
        </a>
        
    </nav>

    <div class="px-12 pb-20">
        <div class="text-center mb-12">
            <p class="text-3xl font-bold">{{ Auth::user()->name ?? 'Dosen' }}</p>
            <p class="text-green-200 text-xl">Dosen Pengajar</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center py-8 px-10 bg-red-600 hover:bg-red-700 rounded-3xl text-2xl font-bold transition">
                <span class="mr-8 text-5xl">🚪</span> Logout
            </button>
        </form>
    </div>
</aside>