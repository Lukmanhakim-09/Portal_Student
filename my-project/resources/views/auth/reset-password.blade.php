<x-auth-full>
    <div class="min-h-screen flex items-center justify-center px-6 py-12 bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-lg bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-8">
            <div class="mb-6 text-center">
                <img src="{{ asset('images/logokalla.png') }}" alt="Kalla Institute" class="mx-auto h-10 w-auto" />
                <h2 class="mt-3 text-lg font-semibold text-gray-900 dark:text-gray-100">Reset Password</h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Masukkan email dan password baru Anda.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username"
                           class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 py-2.5 px-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-green-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 py-2.5 px-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-green-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="mt-1 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 py-2.5 px-3 text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:border-green-500 focus:ring-green-500" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end pt-2">
                    <button type="submit" class="inline-flex justify-center items-center rounded-md bg-green-600 px-4 py-2.5 text-white font-medium hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-auth-full>
