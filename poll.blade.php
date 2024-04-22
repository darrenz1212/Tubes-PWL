<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Poll Mata Kuliah') }}
        </h2>
    </x-slot>
    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    @if (session('sks_error'))
        <div class="alert alert-danger text-center">
            {{ session('sks_error') }}
        </div>
    @endif
    <div class="container mx-auto text-card-green">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h1 class="text-card-green mt-5" style="font-size: 500%;"><b>Vote Mata Kuliah</b></h1>
                <h2 class="mb-4" >Syarat pemilihan mata kuliah:</h2>
                <div class="mx-auto text-center" style="max-width: 400px;">
                    <ul style="list-style-type: disc;">
                        <li>Anda dapat memilih lebih dari satu mata kuliah</li>
                        <li>Jumlah SKS yang dapat dipilih adalah 9 SKS</li>
                        <li>Vote yang diambil adalah vote terakhir anda</li>
                    </ul>
                </div><br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#voteModal">
                    View My Vote
                </button><br>

                <div class="modal fade" id="voteModal" tabindex="-1" aria-labelledby="voteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="voteModalLabel">My Vote</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if (session('voted'))
                              <p>{{ session('voted') }}</p>
                            @else
                              <p>You have not voted yet.</p>
                            @endif
                            @if (session('my_vote'))
                              <p>My vote:</p>
                              <ul>
                                @foreach (session('my_vote') as $course_id)
                                  <li>{{ matkul::find($course_id)->nama_matkul }}</li>
                                @endforeach
                              </ul>
                            @endif
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
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
                        <button id="submitBtn" class="bg-card-green hover:bg-soft-green text-cream px-4 btn transition duration-150 ease-in-out" style="width: 10rem; height: 2rem; border-radius: 5px">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
