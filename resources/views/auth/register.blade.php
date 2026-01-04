<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-blue-800">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl p-12">
            <!-- Logo & Judul -->
            <div class="text-center mb-12">
                <img src="{{ asset('images/logo-uhn.jpeg') }}" alt="Logo UHN" class="w-32 mx-auto rounded-full border-8 border-white shadow-xl">
                <h2 class="mt-6 text-4xl font-extrabold text-blue-900">Daftar Akun</h2>
                <p class="mt-2 text-xl text-gray-600">Universitas Hindu Negeri Denpasar</p>
                <p class="mt-4 text-lg text-gray-500">Isikan data anda untuk membuat akun baru</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-blue-900 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-6 py-5 text-xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-400">
                    @error('name') <span class="text-red-600 text-sm block mt-2">{{ $message }}</span> @enderror
                </div>

                <!-- NIM -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-blue-900 mb-2">NIM</label>
                    <input type="text" name="nim" value="{{ old('nim') }}" required class="w-full px-6 py-5 text-xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-400">
                    @error('nim') <span class="text-red-600 text-sm block mt-2">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-blue-900 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-6 py-5 text-xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-400">
                    @error('email') <span class="text-red-600 text-sm block mt-2">{{ $message }}</span> @enderror
                </div>

                <!-- Password dengan ikon mata SVG -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-blue-900 mb-2">Password</label>
                    <div class="relative">
                        <input id="password-reg" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="new-password"
                               class="w-full px-6 py-5 pr-16 text-xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-400">
                        
                        <button type="button" onclick="togglePasswordReg()" 
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-700 hover:text-blue-900">
                            <!-- Eye Open (show) -->
                            <svg id="eye-open-reg" class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Eye Closed (hide) -->
                            <svg id="eye-closed-reg" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    @error('password') <span class="text-red-600 text-sm block mt-2">{{ $message }}</span> @enderror
                </div>

                <!-- Konfirmasi Password dengan ikon mata SVG -->
                <div class="mb-8">
                    <label class="block text-xl font-bold text-blue-900 mb-2">Konfirmasi Password</label>
                    <div class="relative">
                        <input id="password-confirm-reg" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               class="w-full px-6 py-5 pr-16 text-xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-400">
                        
                        <button type="button" onclick="toggleConfirmReg()" 
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-700 hover:text-blue-900">
                            <!-- Eye Open (show) -->
                            <svg id="eye-open-confirm" class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Eye Closed (hide) -->
                            <svg id="eye-closed-confirm" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Role -->
                <div class="mb-12">
                    <label class="block text-xl font-bold text-blue-900 mb-2">Role</label>
                    <select name="role" class="w-full px-6 py-5 text-xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-400">
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="dosen">Dosen</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Tombol Daftar -->
                <div class="text-center">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-20 py-8 rounded-full text-3xl font-bold shadow-xl w-full transition hover:scale-105">
                        Daftar
                    </button>
                </div>

                <!-- Link Login -->
                <div class="mt-8 text-center">
                    <p class="text-xl text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-800 underline">
                            Login
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk toggle ikon mata -->
    <script>
        function togglePasswordReg() {
            const password = document.getElementById('password-reg');
            const eyeOpen = document.getElementById('eye-open-reg');
            const eyeClosed = document.getElementById('eye-closed-reg');

            if (password.type === 'password') {
                password.type = 'text';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                password.type = 'password';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        }

        function toggleConfirmReg() {
            const password = document.getElementById('password-confirm-reg');
            const eyeOpen = document.getElementById('eye-open-confirm');
            const eyeClosed = document.getElementById('eye-closed-confirm');

            if (password.type === 'password') {
                password.type = 'text';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                password.type = 'password';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        }
    </script>
</x-guest-layout>