<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Poll Mata Kuliah') }}
        </h2>
    </x-slot>

    <div class="container mx-auto text-card-green">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h1 class="text-card-green mt-5" style="font-size: 500%;"><b>Vote Mata Kuliah</b></h1>
                <h2 class="mb-4" >Syarat pemilihan mata kuliah:</h2>
                <div class="mx-auto text-center" style="max-width: 400px;">
                    <ul style="list-style-type: disc;">
                        <li>Anda dapat memilih lebih dari satu mata kuliah</li>
                        <li>Jumlah SKS yang dapat dipilih adalah 9 SKS</li>
                    </ul>
                </div>
                <form method="post" action="{{ route('create-poll') }}">
                    @csrf
                    <div class="mx-auto mt-5 text-center">
                        <table class="mx-auto text-card-green">
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
    </div>
</x-app-layout>

<script>
    // document.getElementById('submitBtn').addEventListener('click', function() {
    //     const swalWithBootstrapButtons = Swal.mixin({
    //         customClass: {
    //             confirmButton: 'btn btn-success',
    //             cancelButton: 'btn btn-danger'
    //         },
    //         buttonsStyling: false
    //     });
    //
    //     swalWithBootstrapButtons.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Yes, submit it!',
    //         cancelButtonText: 'No, cancel!',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // Trigger form submission
    //             document.querySelector('form').submit();
    //         } else if (
    //             /* Read more about handling dismissals below */
    //             result.dismiss === Swal.DismissReason.cancel
    //         ) {
    //             swalWithBootstrapButtons.fire(
    //                 'Cancelled',
    //                 'Your submission has been cancelled',
    //                 'error'
    //             );
    //         }
    //     });
    // });
</script>