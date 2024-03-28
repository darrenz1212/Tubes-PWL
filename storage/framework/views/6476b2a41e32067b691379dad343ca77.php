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
            <?php echo e(__('Poll')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto text-card-green">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h1 class="mb-4 mt-4" style="font-size: 300%"><b>Vote Mata Kuliah</b></h1>
                <h2 class="mb-4">Syarat pemilihan mata kuliah:</h2>
                <div class="mx-auto text-center" style="max-width: 400px;">
                    <ul style="list-style-type: disc;">
                        <li>Anda dapat memilih lebih dari satu mata kuliah</li>
                        <li>Jumlah SKS yang dapat dipilih adalah 9 SKS</li>
                    </ul>
                </div>
                <div class="mx-auto mt-5 text-center">
                    <table class="mx-auto table table-bordered">
                        <tr class="" style="font-size: 1.6rem;">
                            <th class="px-4 pb-5"></th>
                            <th class="px-4 pb-5">Nama Mata Kuliah</th> 
                            <th class="px-4 pb-5">ID Mata Kuliah</th>
                            <th class="px-4 pb-5">Kurikulum</th>
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
                            <td class="pb-5"><?php echo e($matkul->id_matkul); ?></td>
                            <td class="pb-5"><?php echo e($matkul->kurikulum); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <button id="submitBtn" class="bg-card-green hover:bg-soft-green text-cream px-4 btn transition duration-150 ease-in-out" style="width: 10rem; height: 2rem; border-radius: 5px">Submit</button>
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

<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, submit it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger form submission
                document.querySelector('form').submit();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your submission has been cancelled',
                    'error'
                );
            }
        });
    });
</script><?php /**PATH C:\Users\Femmy Friscilla\Documents\Tubes-PWL-main\resources\views/poll/poll.blade.php ENDPATH**/ ?>