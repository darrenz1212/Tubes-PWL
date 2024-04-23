<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <div class="row justify-content-center">
                <div class="col-md-12 mb-5">
                    <div class="text-center text-card-green">
                        <p class="text-card-green " style="font-size: 500%;">
                            User Data
                        </p>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-9"></div>
                        <div class="col-md-3 text-end">
                            <input type="text" id="searchInput" class="form-control mb-3 bg-soft-green active:bg-soft-green" placeholder="Search..." style="border-radius: 10px;">
                            <button type="button" id="searchBtn" class="btn bg-soft-green hover:bg-dark-cream text-center">Search</button>
                        </div>                        
                    </div>
                <table id="userTable" class="userTable mx-auto text-card-green" style="width: 100%; margin: 0 auto; font-size: 1.6rem; margin-top: 2rem;">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center bg-dark-cream p-2">
                                NRP
                                <i class="fas fa-sort justify-content-end" onclick="sortTable(0)"></i>
                            </th>
                            <th scope="col" class="text-center bg-dark-cream">
                                Nama
                                <i class="fas fa-sort justify-content-end" onclick="sortTable(1)"></i>
                            </th>
                            <th scope="col" class="text-center bg-dark-cream">
                                Role
                                <i class="fas fa-sort justify-content-end" onclick="sortTable(2)"></i>
                            </th>
                            <th scope="col" class="text-center bg-dark-cream">
                                Email
                                <i class="fas fa-sort justify-content-end" onclick="sortTable(3)"></i>
                            </th>
                            <th scope="col" class="text-center bg-dark-cream pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr style="line-height: 200%;">
                            <td class="p-3 text-center">{{ $user->nrp }}</td>
                            <td class="text-center">{{ $user->nama }}</td>
                            @if($user->role == 1)
                                <td class="text-center">Mahasiswa</td>
                            @elseif($user->role == 0)
                                <td class="text-center">Prodi</td>
                            @else
                                <td class="text-center">Admin</td>
                            @endif
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col text-end">
                                        <form action="{{ route('update', $user) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <button type="button" onclick="window.location='{{ route('userUpdate', $user->nrp) }}'" class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white hover:bg-grey">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col text-start">
                                        @if ($user->nrp != auth()->user()->nrp)
                                        <form action="{{ route('updateDelete.destroy', $user) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" onclick="confirmDelete(event)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        @else
                                        <button type="button" class="inline-flex items-center px-4 py-2 bg-grey border border-danger rounded-md font-semibold text-xs text-danger uppercase tracking-widest hover:bg-red-900 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" disabled>
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        @endif
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
                    event.target.closest('form').submit();
                }
            });
        }

        document.getElementById('searchBtn').addEventListener('click', function() {
            var input = document.getElementById('searchInput').value.toLowerCase();
            var rows = document.getElementsByTagName('tr');
    
            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var showRow = false;
    
                for (var j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().indexOf(input) > -1) {
                        showRow = true;
                        break;
                    }
                }
    
                if (showRow) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        });

        function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("userTable");
        switching = true;
        dir = "asc"; 
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++; 
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
    </script>
</x-app-layout>
