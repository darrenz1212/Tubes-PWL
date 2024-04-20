<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Edit User Data') }}
        </h2>
    </x-slot>

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center text-card-green">
                    <p class="text-card-green " style="font-size: 500%;">
                        User Data
                    </p>
                </div>
                <table class="userTable mx-auto text-card-green" style="width: 100%; margin: 0 auto; font-size: 1.6rem; margin-top: 2rem;" >
                    <thead>
                        <tr>
                            <th scope="col" class="text-center bg-dark-cream p-2">NRP</th>
                            <th scope="col" class="text-center bg-dark-cream ">Nama</th>
                            <th scope="col" class="text-center bg-dark-cream">Email</th>
                            <th scope="col" class="text-center bg-dark-cream pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr style="line-height: 200%;">
                                <td class="p-3 text-center">{{ $user->nrp }}</td>
                                <td class="text-center">{{ $user->nama }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ route('update', $user) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="PUT"> <!-- Tambahkan input hidden untuk metode PUT -->
                                                <button type="button" onclick="window.location='{{ route('userUpdate', $user->nrp) }}'" class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-black focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <form action="{{ route('updateDelete.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(event) {
            event.preventDefault();

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Aksi ini tidak dapat diurungkan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }
    </script>
</x-app-layout>
