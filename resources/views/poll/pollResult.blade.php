<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Polling Result') }}
        </h2>
    </x-slot>
    <div class="container">
        <table border="1">
            <th>Nama Matkul</th>
            <th>ID matkul</th>
            <th>Jumlah Vote</th>

            @foreach($hasilPol as $h)
                <tr>
                    <td>{{ $h->nama_matkul }}</td>
                    <td>{{ $h->id_matkul }}</td>
                    <td>{{ $h->jumlah }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
