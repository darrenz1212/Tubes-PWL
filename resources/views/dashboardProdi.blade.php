<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Dashboard (Admin)') }}
        </h2>
    </x-slot>

    <div class="flex justify-center" style="margin-left: 10%; margin-right:10%;">
        <div class="text-center text-card-green">
            <p style="font-size: 3.6rem;">
                Selamat datang
            </p>
            <p style="font-size: 1.2rem;">
            Hai {{ Auth::user()->nama }}, anda masuk sebagai Prodi! <br>
            Silahkan vote mata kuliah yang anda inginkan
            untuk dibuka di semester antara Juli-September 2024.
            </p>
            <div style="margin-top: 5%">
                <a href="{{ route('addMK') }}" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Add MK</a>
                <a href="{{ route('pollResult') }}" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Hasil Polling</a>
            </div>
        </div>
    </div>
</x-app-layout>
