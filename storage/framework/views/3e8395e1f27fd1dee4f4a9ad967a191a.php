<head>
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

<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 id="polling-header" class="font-semibold text-xl text-card-green leading-tight">
            <?php echo e(__('Polling Result')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <h1 align="center" class="text-card-green mt-5" style="font-size: 500%;">Hasil Polling</h1>
    <h2 align="center" id="date-time" class="text-card-green" style="font-size: 200%;">Per</h2>

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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totalVotes = 0;
                            foreach($hasilPol as $h) {
                                $totalVotes += $h->jumlah;
                            }
                            ?>
                        <?php $__currentLoopData = $hasilPol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="p-3 text-center"><?php echo e($h->nama_matkul); ?></td>
                            <td class="text-center"><?php echo e($h->id_matkul); ?></td>
                            <td class="text-center"><?php echo e($h->jumlah); ?></td>
                            <td class="vote-bar-cell">
                                <div class="vote-bar bg-soft-green text-center" style="width: <?php echo e(($h->jumlah / $totalVotes) * 100); ?>%"></div>
                                <div class="vote-text text-dark-creama"><?php echo e(round(($h->jumlah / $totalVotes) * 100)); ?>%</div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <button style="width: 8rem;" type="button" class="btn bg-card-green text-cream hover:bg-soft-green hover:text-card-green" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // datetime
    const currentDateTime = new Date();
    const formattedDateTime = currentDateTime.toLocaleString();
    document.getElementById('date-time').innerText += ' ' + formattedDateTime;

    // pie chart
    var pieData = [
        <?php $__currentLoopData = $hasilPol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
            label: "<?php echo e($h->nama_matkul); ?>",
            value: <?php echo e($h->jumlah); ?>,
            color: getRandomColor()
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\Users\Femmy Friscilla\Downloads\Tubes-PWL-Darren-patch-2\resources\views/poll/pollResult.blade.php ENDPATH**/ ?>