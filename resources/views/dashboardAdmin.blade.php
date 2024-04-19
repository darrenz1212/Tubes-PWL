<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Dashboard (Admin)') }}
        </h2>
    </x-slot>

    <div class="flex justify-center" style="margin-left: 10%; margin-right:10%;">
        <div class="text-center text-card-green">
            <p class="mt-5" style="font-size: 500%;">
                Selamat datang
            </p>
            <p style="font-size: 1.2rem;">
            Hai {{ Auth::user()->nama }}, anda masuk sebagai Admin! <br>

            </p>
            <div style="margin-top: 5%">
                <a href="{{ route('registerUser') }}" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Register User</a>
                <a href="{{ route('updateDelete') }}" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Update/Delete User</a>
            </div>
        </div>
    </div>
</x-app-layout>
