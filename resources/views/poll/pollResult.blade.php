<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ZhQv/LLWeaX4cn7JZzpwk56+b53EXd3pXrEl/ZpJCBjXxhuEeeeoN4D3RkWu9tVow0egFk8hMMqYjLzIwTrK8g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<style>
    .pollTable {
        margin: 0 auto;
        font-size: 1.6rem;
        margin-top: 2rem;
    }

    td {
        line-height: 200%;
    }

    .vote-bar-cell {
        position: relative;
        padding: 0;
    }

    .vote-bar {
        height: 1.6rem;
        animation: increaseWidth 2s ease-in-out forwards;
        border-radius: 20px;
    }

    .vote-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 14px;
    }

    @keyframes increaseWidth {
        from { width: 0; }
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 id="polling-header" class="font-semibold text-xl text-card-green leading-tight">
            {{ __('Polling Result') }}
        </h2>
    </x-slot>
    <h1 align="center" class="text-card-green mt-5" style="font-size: 500%;">Hasil Polling</h1>
    <p align="center" id="date-time" class="text-card-green">Per</p>

    <div class="container mt-5" style="margin: auto">
        <div class="row justify-content-center">
            <div class="col justify-content-center">
                <table class="pollTable text-card-green" border="1" style="width: 80%;">
                    <thead>
                        <tr>
                            <th class="text-center bg-dark-cream p-2">Mata Kuliah</th>
                            <th class="text-center bg-dark-cream">Kode Mata Kuliah</th>
                            <th class="text-center bg-dark-cream">Jumlah Vote</th>
                            <th class="text-center bg-dark-cream">Persentase</th>
                            <th class="text-center bg-dark-cream">></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalVotes = 0;
                            foreach($hasilPol as $h) {
                                $totalVotes += $h->jumlah;
                            }
                        @endphp
                        @foreach($hasilPol as $h)
                            <form action="{{ route('show-poll') }}" method="get">
                                <tr>
                                    <td class="p-3 text-center">{{ $h->nama_matkul }}</td>
                                    <td class="text-center">{{ $h->id_matkul }}</td>
                                    <td class="text-center">{{ $h->jumlah }}</td>
                                    <td class="vote-bar-cell">
                                        <div class="vote-bar bg-soft-green text-center" style="width: {{ ($h->jumlah / $totalVotes) * 100 }}%"></div>
                                        <div class="vote-text text-dark-creama">{{ round(($h->jumlah / $totalVotes) * 100) }}%</div>
                                    </td>
                                    <td>
                                        <input type="hidden" value="{{ $h-> id_matkul }}" name="id_matkul">
                                        <button type="submit" class="btn btn-light">
                                            <i class="fas fa-arrow-right">></i>
                                        </button>
                                    </td>
                                </tr>
                            </form>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <button style="width: 8rem;" type="button" class="btn bg-card-green text-cream hover:bg-soft-green hover:text-card-green  mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Chart
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bg-cream">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-card-green" id="exampleModalLabel">Pie chart hasil polling</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <canvas id="pollChart" width="400" height="400"></canvas>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-danger hover:text-white" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // datetime
    const currentDateTime = new Date();
    const formattedDateTime = currentDateTime.toLocaleString();
    document.getElementById('date-time').innerText += ' ' + formattedDateTime;

    // pie chart
    var pieData = [
        @foreach($hasilPol as $h)
        {
            label: "{{ $h->nama_matkul }}",
            value: {{ $h->jumlah }},
            color: getRandomColor()
        },
        @endforeach
    ];

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    var ctx = document.getElementById("pollChart").getContext("2d");
    var pollChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: pieData.map(function(entry) {
                    return entry.value;
                }),
                backgroundColor: pieData.map(function(entry) {
                    return entry.color;
                })
            }],
            labels: pieData.map(function(entry) {
                return entry.label;
            })
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
