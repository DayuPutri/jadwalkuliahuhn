<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Jadwal Kuliah - UHN Denpasar</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full bg-gradient-to-br from-blue-900 to-indigo-900 flex items-center justify-center">
    <div class="bg-white rounded-3xl shadow-2xl p-20 max-w-4xl text-center">
        <!-- Ganti dengan logo kampus kamu -->
        <img src="{{ asset('images/logo-uhn.jpeg') }}" alt="Logo UHN Denpasar" class="w-64 mx-auto mb-12 rounded-full shadow-xl border-8 border-yellow-400">
        
        <h1 class="text-6xl font-black text-blue-900 mb-8">Portal Jadwal Kuliah</h1>
        <p class="text-4xl text-gray-700 mb-12">
            Program Studi Informatika<br>
            Universitas Hindu Negeri Denpasar
        </p>
        
        <a href="{{ route('login') }}" class="bg-green-600 hover:bg-green-700 text-white px-32 py-12 rounded-full text-5xl font-black shadow-2xl transition hover:scale-105 inline-block">
            Masuk ke Sistem →
        </a>
        
        <p class="text-2xl text-gray-600 mt-12">
            Admin • Dosen • Mahasiswa
        </p>
    </div>
</body>
</html>