<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="flex justify-center" style="margin-left: 10%; margin-right:10%;">
        <div class="text-center text-card-green">
            <p class="text-card-green mt-5" style="font-size: 500%;">
                Selamat datang
            </p>
            <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->isAdmin('Admin')): ?>
                <p style="font-size: 1.2rem;">
                    Hai <?php echo e(Auth::user()->nama); ?>, anda masuk sebagai Admin! <br>
                    Anda dapat mendaftarkan user, mengubah, dan menghapus data user.
                </p>
                <div style="margin-top: 5%">
                    <a href="<?php echo e(route('registerUser')); ?>" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Register User</a>
                    <a href="<?php echo e(route('updateDelete')); ?>" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Update/Delete User</a>
                </div>
            <?php elseif(Auth::user()->isAdmin('Mahasiswa')): ?>
                <p style="font-size: 1.5rem;">
                    Hai <?php echo e(Auth::user()->nama); ?>, Anda masuk sebagai mahasiswa! <br>
                    Silahkan vote mata kuliah yang Anda inginkan untuk dibuka di semester antara Juli-September 2024.
                </p>
                <div style="margin-top: 5%">
                    <a href="<?php echo e(route('poll')); ?>" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Vote Sekarang</a>
                </div>
            <?php else: ?>
                <p style="font-size: 1.2rem;">
                    Hai <?php echo e(Auth::user()->nama); ?>, anda masuk sebagai Prodi! <br>
    
                </p>
                <div style="margin-top: 5%">
                    <a href="<?php echo e(route('addMK')); ?>" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Add MK</a>
                    <a href="<?php echo e(route('pollResult')); ?>" style="font-size: 30px; margin:auto;" class="btn bg-card-green hover:bg-soft-green text-cream font-bold py-2 px-4 rounded mt-4 inline-block">Hasil Polling</a>
                </div>
            <?php endif; ?>
        
            <?php endif; ?>
            

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
<?php /**PATH C:\Users\Femmy Friscilla\Downloads\Tubes-PWL-Darren-patch-2\resources\views/dashboard.blade.php ENDPATH**/ ?>