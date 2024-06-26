<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<x-guest-layout>
    <h1 class="text-cream font-bold text-5xl text-center">Selamat datang!</h1>
    <h2 class="text-cream text-xl text-center">Silahkan isi data diri dan password</h2>
    <br>
    <form id="registerForm" method="POST" action="{{ route('register-user') }}">
        @csrf

        <div class="row">
            <div class="col">
                <div class="mb-4">
                    <x-input-label for="nama" :value="__('Nama')" />
                    <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="nrp" :value="__('NRP')" />
                    <x-text-input id="nrp" class="block mt-1 w-full" type="text" name="nrp" :value="old('nrp')" required  />
                    <x-input-error :messages="$errors->get('nrp')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="prodi" :value="__('Program Studi')" />
                    <x-text-input id="prodi" class="block mt-1 w-full" type="text" name="prodi" :value="old('prodi')" required  />
                    <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="fakultas" :value="__('Fakultas')" />
                    <x-text-input id="fakultas" class="block mt-1 w-full" type="text" name="fakultas" :value="old('fakultas')" required  />
                    <x-input-error :messages="$errors->get('fakultas')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-orange-100 hover:text-green-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>

            <x-primary-button id="registerButton" class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#registerForm').on('submit', function(event) {
        event.preventDefault(); 
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                console.log("Sukses!");
                showAlert('success', 'Akun anda berhasil didaftarkan!');
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
                console.log("XHR:", xhr.responseText);
                if (xhr.responseText.includes("Duplicate entry")) {
                    showAlert('error', 'NRP telah digunakan. Mohon gunakan NRP yang lain.');
                } else {
                    showAlert('error', 'Terjadi kesalahan saat melakukan operasi. Mohon coba lagi.');
                }
            }
        });
    });
</script>

