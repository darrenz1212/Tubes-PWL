<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Add Mata Kuliah') }}
        </h2>
    </x-slot>
    <div class="flex justify-center" style="margin-left: 10%; margin-right:10%;">
        <div class="text-center text-card-green">
            <p style="font-size: 3.6rem;">
                Silahkan masukkan mata kuliah
            </p>
            <section>
                <form id="addMatkulForm" action="{{ route('mata-kuliah.store') }}" method="POST" class="">
                    @csrf
                    <div class="mb-3">
                        <label for="id_matkul" class="form-label font-medium text-card-green">Kode Mata Kuliah</label><br>
                        <input type="text" name="id_matkul" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="id_matkul">
                    </div>
                    <div class="mb-3">
                        <label for="nama_matkul" class="form-label font-medium text-card-green">Nama Mata Kuliah</label><br>
                        <input type="text" name="nama_matkul" class="custom-input bg-soft-green text-card-green  focus-ring py-1 px-2 text-decoration-none border rounded-2" id="nama_matkul">
                    </div>
                    <div class="mb-3">
                        <label for="kurikulum" class="form-label font-medium text-card-green">Kurikulum</label><br>
                        <input type="text" name="kurikulum" class="custom-input bg-soft-green text-card-green  focus-ring py-1 px-2 text-decoration-none border rounded-2" id="kurikulum">
                    </div>

                    <div class="mb-3">
                        <label for="sks" class="form-label font-medium text-card-green">Jumlah SKS</label><br>
                        <input type="number" name="sks" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="sks">
                    </div>
                    <button type="submit" class="btn btn-primary bg-card-green hover:bg-soft-green">Submit</button>
                </form>
            </section>
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#addMatkulForm').on('submit', function(event) {
        event.preventDefault();
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                console.log("Sukses!");
                showAlert('success', 'Mata kuliah berhasil ditambahkan');
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
                showAlert('error', 'Gagal menambahkan mata kuliah. Pastikan kode mata kuliah tidak sama dan semua sudah terisi!');
            }
        });
    });

    function showAlert(icon, message) {
        Swal.fire({
            title: icon === 'success' ? 'Success!' : 'Error!',
            text: message,
            icon: icon,
            showClass: {
                popup: 'animate__animated animate__fadeInUp animate__faster'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutDown animate__faster'
            }
        });
    }
</script>
