<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Delete Mata Kuliah') }}
        </h2>
    </x-slot>
    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="container mx-auto text-card-green">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h1 class="text-card-green mt-5" style="font-size: 500%;"><b>Silahkan pilih mata kuliah untuk dihapus</b></h1>

                <form method="post" action="{{ route('delete-mk') }}">
                    @csrf
                    @method('DELETE')
                    <div class="mx-auto mt-5 text-center">
                        <table class="mx-auto text-card-green">
                            <tr class="" style="font-size: 1.6rem;">
                                <th class="px-4 pb-5"></th>
                                <th class="px-4 pb-5">Nama Mata Kuliah</th>
                                <th class="px-4 pb-5">ID Mata Kuliah</th>
                                <th class="px-4 pb-5">Kurikulum</th>
                                <th class="px-4 pb-5">SKS</th>
                            </tr>
                            @foreach($polling as $matkul)
                                <tr>
                                    <td class="pb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="selected_courses[]" id="course_{{ $matkul->id_matkul }}" value="{{ $matkul->id_matkul }}">

                                            <label class="form-check-label" for="course_{{ $matkul->id_matkul }}"></label>
                                        </div>
                                    </td>
                                    <td class="pb-5">{{ $matkul->nama_matkul }}</td>
                                    <td class="pb-5 text-center">{{ $matkul->id_matkul }}</td>
                                    <td class="pb-5 text-center">{{ $matkul->kurikulum }}</td>
                                    <td class="pb-5 text-center">{{ $matkul->sks }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <button id="submitBtn" class="bg-card-green hover:bg-soft-green text-cream px-4 py-1 btn transition duration-150 ease-in-out" style="width: 10rem; height: 2rem; border-radius: 5px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
