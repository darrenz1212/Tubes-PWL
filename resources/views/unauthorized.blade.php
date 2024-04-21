<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<x-guest-layout>
    <h1 class="text-cream font-bold text-5xl text-center">Unauthorized</h1>
    <p class="text-cream font-bold text-center">Anda tidak punya akses ke halaman ini</p>
    <br>
    <a class="btn bg-cream hover:bg-soft-green text-card-green mx-auto d-block" href="{{ route('dashboard') }}">Kembali ke dashboard</a>
    
</x-guest-layout>

