<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Add Mata Kuliah to Poll') }}
        </h2>
    </x-slot>
    <div class="flex justify-center" style="margin-left: 10%; margin-right:10%;">
        <div class="text-center text-card-green">
            <p style="font-size: 3.6rem;">
                Silahkan pilih mata kuliah untuk dimasukkan di poll
            </p>
            <form method="post" action="{{ route('create-poll') }}">
                @csrf
                <div class="mx-auto mt-5 text-center">
                    <table class="mx-auto table table-bordered">
                        <tr class="" style="font-size: 1.6rem;">
                            <th class="px-4 pb-5"></th>
                            <th class="px-4 pb-5">Nama Mata Kuliah</th>
                            <th class="px-4 pb-5">ID Mata Kuliah</th>
                            <th class="px-4 pb-5">Kurikulum</th>
                            <th class="px-4 pb-5">SKS</th>
                        </tr>
                        @foreach($mata_kuliah as $matkul)
                            <tr>
                                <td class="pb-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="selected_courses[]" id="course_{{ $matkul->id_polling }}" value="{{ $matkul->id_polling }}">
                                        <label class="form-check-label" for="course_{{ $matkul->id_matkul }}"></label>
                                    </div>
                                </td>
                                <td class="pb-5">{{ $matkul->nama_matkul }}</td>
                                <td class="pb-5">{{ $matkul->id_matkul }}</td>
                                <td class="pb-5">{{ $matkul->kurikulum }}</td>
                                <td class="pb-5">{{ $matkul->sks }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <button id="submitBtn" class="bg-card-green hover:bg-soft-green text-cream px-4 btn transition duration-150 ease-in-out" style="width: 10rem; height: 2rem; border-radius: 5px">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<style>
    .custom-input {
        width: 100%; 
        height: 40px;
        padding: 8px;
        font-size: 16px; 
        border-radius: 4px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-top: 5px; 
        transition: box-shadow 0.3s; 
        outline: 0; 
    }

    .custom-input:focus {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); 
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
