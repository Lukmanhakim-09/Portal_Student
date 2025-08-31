<x-auth-full>
    <!-- Two-column layout -->
    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2 bg-white dark:bg-gray-900">
        <!-- Left: Hero Image -->
        <div class="hidden lg:block relative">
            <img
                src="{{ asset('images/campus.jpg') }}"
                alt="Campus"
                class="h-full w-full object-cover"
            />
            <div class="absolute inset-0 bg-gradient-to-br from-green-600/40 to-emerald-400/30 mix-blend-multiply"></div>
        </div>

        <!-- Right: Login Form -->
        <div class="flex items-center justify-center px-6 py-12 sm:px-8 lg:px-12">
            <div class="w-full max-w-md">
                <!-- Logo and Heading -->
                <div class="mb-8 text-center">
                    <img src="{{ asset('images/logokalla.png') }}" alt="Kalla Institute" class="mx-auto h-12 w-auto" />
                    <h1 class="mt-4 text-2xl font-bold text-gray-900 dark:text-gray-100">SISTEM INFORMASI AKADEMIK</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Silakan login menggunakan Username & Password anda!</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email/NIM -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIM / Email</label>
                        <div class="mt-1 relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <!-- User icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                    <path fill-rule="evenodd" d="M12 2.25a4.5 4.5 0 0 0-2.598 8.202A9.004 9.004 0 0 0 3 19.5a.75.75 0 0 0 1.5 0 7.5 7.5 0 1 1 15 0 .75.75 0 0 0 1.5 0 9.004 9.004 0 0 0-6.402-9.048A4.5 4.5 0 0 0 12 2.25Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="email" name="email" type="email" autocomplete="username" required autofocus
                                   placeholder="contoh: 221031018 / email@kampus.ac.id"
                                   class="block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 py-2.5 pl-10 pr-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-green-500" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                        <div class="mt-1 relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <!-- Lock icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                    <path fill-rule="evenodd" d="M12 1.5a4.5 4.5 0 0 0-4.5 4.5v3H6a2.25 2.25 0 0 0-2.25 2.25v7.5A2.25 2.25 0 0 0 6 21h12a2.25 2.25 0 0 0 2.25-2.25v-7.5A2.25 2.25 0 0 0 18 9h-1.5V6A4.5 4.5 0 0 0 12 1.5Zm3 7.5V6a3 3 0 1 0-6 0v3h6Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                   placeholder="Masukkan password"
                                   class="block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 py-2.5 pl-10 pr-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-green-500" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-green-600 shadow-sm focus:ring-green-500 dark:focus:ring-green-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-green-700 hover:text-green-800 dark:text-green-300 dark:hover:text-green-200" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="space-y-3 pt-2">
                        <button type="submit" class="w-full inline-flex justify-center items-center rounded-md bg-green-600 px-4 py-2.5 text-white font-medium hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Login
                        </button>
                        <a href="{{ route('register') }}" class="w-full inline-flex justify-center items-center rounded-md bg-green-50 text-green-700 px-4 py-2.5 font-medium hover:bg-green-100 dark:bg-green-900/30 dark:text-green-300">
                            Registrasi
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-auth-full>
