<x-guest-layout>
    <h1 class="text-cream font-bold text-5xl text-center">Selamat datang!</h1>
    <h2 class="text-cream text-xl text-center">Silahkan nama, NRP, dan password</h2>
    <br>
    <form method="POST" action="{{ route('register-user') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nama" :value="__('nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="nrp" :value="__('nrp')" />
            <x-text-input id="nrp" class="block mt-1 w-full" type="text" name="nrp" :value="old('nrp')" required  />
            <x-input-error :messages="$errors->get('nrp')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="prodi" :value="__('prodi')" />
            <x-text-input id="prodi" class="block mt-1 w-full" type="text" name="prodi" :value="old('prodi')" required  />
            <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="fakultas" :value="__('fakultas')" />
            <x-text-input id="fakultas" class="block mt-1 w-full" type="text" name="fakultas" :value="old('fakultas')" required  />
            <x-input-error :messages="$errors->get('fakultas')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-orange-100 hover:text-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
