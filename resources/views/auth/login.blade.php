<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <h1 class="text-cream font-bold text-5xl text-center">Selamat datang!</h1>
    <h2 class="text-cream text-xl text-center">Silahkan masukkan NRP dan Password</h2>
    <br>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="nrp" :value="__('nrp')"/>
            <x-text-input id="nrp" class="block mt-1 w-full" type="text" name="nrp" :value="old('nrp')" required autofocus />
            <x-input-error :messages="$errors->get('nrp')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded bg-cream border-gray-300 text-soft-green shadow-sm focus:ring-cream dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-orange-100">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            <div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-orange-100 hover:text-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div>
            <div>
                <x-primary-button class="ms-3 bg-soft-green">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>