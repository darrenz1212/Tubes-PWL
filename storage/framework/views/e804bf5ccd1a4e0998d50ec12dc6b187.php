<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
            <?php echo e(__('Edit User Data')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5">
                <div class="text-center text-card-green">
                    <p class="text-card-green " style="font-size: 500%;">
                        User Data
                    </p>
                </div>
                <table class="userTable mx-auto text-card-green" style="width: 100%; margin: 0 auto; font-size: 1.6rem; margin-top: 2rem;">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center bg-dark-cream p-2">NRP</th>
                            <th scope="col" class="text-center bg-dark-cream">Nama</th>
                            <th scope="col" class="text-center bg-dark-cream">Email</th>
                            <th scope="col" class="text-center bg-dark-cream pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr style="line-height: 200%;">
                            <td class="p-3 text-center"><?php echo e($user->nrp); ?></td>
                            <td class="text-center"><?php echo e($user->nama); ?></td>
                            <td class="text-center"><?php echo e($user->email); ?></td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col text-end">
                                        <form action="<?php echo e(route('update', $user)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <button type="button" onclick="window.location='<?php echo e(route('userUpdate', $user->nrp)); ?>'" class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-black focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col text-start">
                                        <?php if($user->nrp != auth()->user()->nrp): ?>
                                        <form action="<?php echo e(route('updateDelete.destroy', $user)); ?>" method="POST" class="delete-form">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" onclick="confirmDelete(event)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        <?php else: ?>
                                        <button type="button" class="inline-flex items-center px-4 py-2 bg-grey border border-danger rounded-md font-semibold text-xs text-danger uppercase tracking-widest hover:bg-red-900 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" disabled>
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    </script>
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
<?php /**PATH C:\Users\Femmy Friscilla\Downloads\Tubes\Tubes-PWL-main\resources\views/updateDelete.blade.php ENDPATH**/ ?>