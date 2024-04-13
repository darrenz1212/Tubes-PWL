<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Update User Data') }}
        </h2>
    </x-slot>
    <div class="flex justify-center" style="margin-left: 10%; margin-right:10%;">
        <div class="text-center text-card-green">
            <p style="font-size: 3.6rem;">
                Update User Data
            </p>
            <section>
                <form id="updateUserDataForm" action="{{ route('userUpdate', ['user' => $user->nrp]) }}" method="POST" class="">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nrp" class="form-label font-medium text-card-green">NRP</label><br>
                        <input type="text" name="nrp" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="nrp" value="{{ $user->nrp }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label font-medium text-card-green">Nama</label><br>
                        <input type="text" name="nama" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="nama" value="{{ $user->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label font-medium text-card-green">Email</label><br>
                        <input type="email" name="email" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="email" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label font-medium text-card-green">Password</label><br>
                        <input type="password" name="password" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label font-medium text-card-green">Prodi</label><br>
                        <input type="text" name="prodi" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="prodi" value="{{ $user->prodi }}">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label font-medium text-card-green">Fakultas</label><br>
                        <input type="text" name="fakultas" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="fakultas" value="{{ $user->fakultas }}">
                    </div>
                    <button type="submit" class="btn btn-primary bg-card-green hover:bg-soft-green">Update</button>
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
    $('#updateUserDataForm').on('submit', function(event) {
        event.preventDefault(); 
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                console.log("Success!");
                showAlert('success', 'User data updated successfully');
            },
            error: function(xhr, status, error) {
                console.log("Error:", error);
                showAlert('error', 'Failed to update user data. Please make sure all fields are filled.');
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
