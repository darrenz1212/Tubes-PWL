<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-card-green overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-cream">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center" style="margin-left: 10%; margin-right:10%;">
        <div class="text-center text-card-green">
            <p style="font-size: 3.6rem;">
                Selamat datang
            </p>
            <p style="font-size: 1.2rem;">
            Hai {{ Auth::user()->nama }}, anda masuk sebagai mahasiswa! <br> 
            Silahkan vote mata kuliah yang anda inginkan
            untuk dibuka di semester antara Juli-September 2024.
            </p>
            <div style="margin-top: 5%">
                <a href="" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Vote Sekarang</a>
                <a href="{{ route('poll') }}" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Hasil Polling</a>
            </div>
        </div>
    </div>
</x-app-layout>
