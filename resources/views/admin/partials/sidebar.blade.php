<aside class="fixed inset-y-0 left-0 w-80 bg-gradient-to-b from-blue-900 to-blue-800 text-white flex flex-col shadow-2xl z-50 overflow-y-auto">
    <!-- Logo & Header -->
    <div class="p-10 text-center border-b-4 border-blue-700">
        <img src="{{ asset('images/logo-uhn.jpeg') }}" alt="Logo UHNG" class="w-40 mx-auto rounded-full shadow-2xl border-8 border-white">
        <h2 class="mt-8 text-4xl font-black">Panel Admin</h2>
        <p class="text-blue-200 text-2xl mt-2">UHN Denpasar</p>
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-1 px-8 py-12 space-y-6">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center py-6 px-8 rounded-3xl text-3xl font-bold transition {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-500 text-black shadow-lg' : 'hover:bg-blue-700' }}">
            <span class="mr-8 text-5xl">🏠</span> Dashboard
        </a>

        <a href="{{ route('admin.kelola-jadwal') }}" 
           class="flex items-center py-6 px-8 rounded-3xl text-3xl font-bold transition {{ request()->routeIs('admin.kelola-jadwal') ? 'bg-yellow-500 text-black shadow-lg' : 'hover:bg-blue-700' }}">
            <span class="mr-8 text-5xl">📅</span> Kelola Jadwal
        </a>

        <a href="{{ route('admin.tambah-jadwal') }}" 
           class="flex items-center py-6 px-8 rounded-3xl text-3xl font-bold transition {{ request()->routeIs('admin.tambah-jadwal') ? 'bg-yellow-500 text-black shadow-lg' : 'hover:bg-blue-700' }}">
            <span class="mr-8 text-5xl">➕</span> Tambah Jadwal Baru
        </a>

        <a href="{{ route('admin.scheduling') }}" 
           class="flex items-center py-6 px-8 rounded-3xl text-3xl font-bold transition {{ request()->routeIs('admin.scheduling') ? 'bg-yellow-500 text-black shadow-lg' : 'hover:bg-blue-700' }}">
            <span class="mr-8 text-5xl">⚙️</span> Penjadwalan Otomatis
        </a>

        <!-- Tambah Dosen - pakai route resource create -->
        <a href="{{ route('admin.tambah-dosen.create') }}" 
           class="flex items-center py-6 px-8 rounded-3xl text-3xl font-bold transition hover:bg-blue-700">
            <span class="mr-8 text-5xl">👨‍🏫</span> Tambah Dosen
        </a>

        <a href="{{ route('admin.profile-dosen') }}" 
           class="flex items-center py-6 px-8 rounded-3xl text-3xl font-bold transition {{ request()->routeIs('admin.profile-dosen') ? 'bg-yellow-500 text-black shadow-lg' : 'hover:bg-blue-700' }}">
            <span class="mr-8 text-5xl">📋</span> Profil Dosen
        </a>
    </nav>

    <!-- User Info & Logout -->
    <div class="px-8 pb-12 border-t-4 border-blue-700">
        <div class="text-center mb-10">
            <p class="text-3xl font-black">{{ auth()->user()->name }}</p>
            <p class="text-blue-200 text-2xl mt-2">Administrator</p>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center py-6 px-8 bg-red-600 hover:bg-red-700 rounded-3xl text-3xl font-black transition shadow-lg">
                <span class="mr-8 text-5xl">🚪</span> Logout
            </button>
        </form>
    </div>
</aside>