<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Jadwal Kuliah')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full bg-gradient-to-br from-blue-950 to-indigo-900 text-white">
    <div class="flex h-screen">
        <!-- Sidebar Dinamis Berdasarkan Role -->
        @auth
            @if(auth()->user()->role == 'admin')
                @include('admin.partials.sidebar')
            @elseif(auth()->user()->role == 'dosen')
                @include('dosen.partials.sidebar')
            @elseif(auth()->user()->role == 'mahasiswa')
                @include('mahasiswa.partials.sidebar')
            @else
                <!-- Fallback kalau role tidak dikenali -->
                <aside class="fixed inset-y-0 left-0 w-80 bg-black bg-opacity-80 p-10 text-center flex flex-col justify-center">
                    <p class="text-4xl font-bold text-red-500">Role tidak dikenali!</p>
                    <form method="POST" action="{{ route('logout') }}" class="mt-12">
                        @csrf
                        <button class="bg-red-600 hover:bg-red-700 px-12 py-6 rounded-3xl text-3xl font-bold">
                            Logout
                        </button>
                    </form>
                </aside>
            @endif
        @endauth

        <!-- Main Content dengan Margin Kiri untuk Sidebar -->
        <main class="flex-1 ml-80 p-10 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>