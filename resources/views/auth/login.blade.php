<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 to-indigo-900">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl p-12">
            <!-- Logo & Judul -->
            <div class="text-center mb-12">
                <img src="{{ asset('images/logo-uhn.jpeg') }}" alt="Logo UHN" class="w-40 mx-auto mb-8 rounded-full shadow-xl border-8 border-yellow-400">
                <h2 class="text-5xl font-black text-blue-900 mb-4">Portal Jadwal Kuliah</h2>
                <p class="text-2xl text-gray-700 mb-2">Universitas Hindu Negeri Denpasar</p>
                <p class="text-xl text-gray-600 mt-6">Masuk dengan NIM/Email Anda</p>
            </div>

            <!-- Status session -->
            <x-auth-session-status class="mb-6 text-center" :status="session('status')" />

            <!-- Pesan error -->
            @if ($errors->has('login'))
                <div class="mb-8 p-6 bg-red-100 border-4 border-red-400 rounded-2xl text-center">
                    <p class="text-2xl font-bold text-red-700">NIM/Email atau password salah!</p>
                    <p class="text-xl text-red-600 mt-2">Silakan coba lagi.</p>
                </div>
            @endif

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- NIM atau Email -->
                <div class="mb-8">
                    <x-input-label for="login" :value="__('NIM / Email')" class="text-2xl font-bold text-blue-900" />
                    <x-text-input id="login" 
                                  class="block mt-3 w-full px-8 py-6 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-400" 
                                  type="text" 
                                  name="login" 
                                  :value="old('login')" 
                                  required 
                                  autofocus 
                                  autocomplete="username" />
                    <x-input-error :messages="$errors->get('login')" class="mt-3 text-xl" />
                </div>

                <!-- Password dengan ikon mata SVG (seperti gambar) -->
                <div class="mb-8">
                    <x-input-label for="password-login" :value="__('Password')" class="text-2xl font-bold text-blue-900" />
                    
                    <div class="relative mt-3">
                        <input id="password-login" 
                               class="block w-full px-8 py-6 pr-16 text-2xl border-4 border-blue-300 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-400" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password">
                        
                        <!-- Tombol mata -->
                        <button type="button" onclick="togglePasswordLogin()" 
                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-700 hover:text-blue-900">
                            <!-- Eye Open (show) -->
                            <svg id="eye-open-login" class="w-8 h-8 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Eye Closed (hide) -->
                            <svg id="eye-closed-login" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    
                    <x-input-error :messages="$errors->get('password')" class="mt-3 text-xl" />
                </div>

                <!-- Remember Me -->
                <div class="mb-10 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="h-8 w-8 rounded border-blue-400 text-blue-600 focus:ring-blue-500">
                    <label for="remember" class="ml-4 text-2xl text-gray-700">Ingat Saya</label>
                </div>

                <!-- Tombol Login -->
                <div class="text-center">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-24 py-8 rounded-full text-4xl font-black shadow-2xl w-full transition hover:scale-105">
                        Login
                    </button>
                </div>

                <!-- Link Daftar -->
                <div class="mt-10 text-center">
                    <p class="text-xl text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-800 underline text-2xl">
                            Daftar
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk toggle ikon mata -->
    <script>
        function togglePasswordLogin() {
            const password = document.getElementById('password-login');
            const eyeOpen = document.getElementById('eye-open-login');
            const eyeClosed = document.getElementById('eye-closed-login');

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