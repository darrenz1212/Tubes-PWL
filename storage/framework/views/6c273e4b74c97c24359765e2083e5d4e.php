<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <h2 class="font-semibold text-xl text-card-green leading-tight">
            <?php echo e(__('Poll Mata Kuliah')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <?php if(session('message')): ?>
        <div class="alert alert-success text-center">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('already_voted')): ?>
        <div class="alert alert-danger text-center">
            <?php echo e(session('already_voted')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('sks_error')): ?>
        <div class="alert alert-danger text-center">
            <?php echo e(session('sks_error')); ?>

        </div>
    <?php endif; ?>
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
                </div>
                <form method="post" action="<?php echo e(route('create-poll')); ?>">
                    <?php echo csrf_field(); ?>   
                    <div class="mx-auto mt-5 text-center">
                        <table class="mx-auto text-card-green">
                            <tr class="" style="font-size: 1.6rem;">
                                <th class="px-4 pb-5"></th>
                                <th class="px-4 pb-5">Nama Mata Kuliah</th>
                                <th class="px-4 pb-5">ID Mata Kuliah</th>
                                <th class="px-4 pb-5">Kurikulum</th>
                                <th class="px-4 pb-5">SKS</th>
                            </tr>
                            <?php $__currentLoopData = $mata_kuliah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matkul): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="pb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="selected_courses[]" id="course_<?php echo e($matkul->id_matkul); ?>" value="<?php echo e($matkul->id_matkul); ?>">
                                            <label class="form-check-label" for="course_<?php echo e($matkul->id_matkul); ?>"></label>
                                        </div>
                                    </td>
                                    <td class="pb-5"><?php echo e($matkul->nama_matkul); ?></td>
                                    <td class="pb-5 text-center"><?php echo e($matkul->id_matkul); ?></td>
                                    <td class="pb-5 text-center"><?php echo e($matkul->kurikulum); ?></td>
                                    <td class="pb-5 text-center"><?php echo e($matkul->sks); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <button id="submitBtn" class="bg-card-green hover:bg-soft-green text-cream px-4 btn transition duration-150 ease-in-out" style="width: 10rem; height: 2rem; border-radius: 5px">Submit</button>
                    </div>
                </form>
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
<?php /**PATH C:\Users\Femmy Friscilla\Downloads\Tubes\Tubes-PWL-main\resources\views/poll/poll.blade.php ENDPATH**/ ?>