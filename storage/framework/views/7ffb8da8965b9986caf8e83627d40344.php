<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

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
            <?php echo e(__('Update User Data')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="flex justify-center" style="margin-left: 10%; margin-right:10%;">
        <div class="text-center text-card-green">
            <p style="font-size: 3.6rem;">
                Update User Data
            </p>
            <section>
                <form id="updateUserDataForm" action="<?php echo e(route('userUpdate', ['user' => $user->nrp])); ?>" method="POST" class="">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nrp" class="form-label font-medium text-card-green">NRP</label><br>
                        <input type="text" name="nrp" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="nrp" value="<?php echo e($user->nrp); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label font-medium text-card-green">Nama</label><br>
                        <input type="text" name="nama" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="nama" value="<?php echo e($user->nama); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label font-medium text-card-green">Email</label><br>
                        <input type="email" name="email" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="email" value="<?php echo e($user->email); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label font-medium text-card-green">Password</label><br>
                        <input type="password" name="password" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label font-medium text-card-green">Prodi</label><br>
                        <input type="text" name="prodi" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="prodi" value="<?php echo e($user->prodi); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label font-medium text-card-green">Fakultas</label><br>
                        <input type="text" name="fakultas" class="custom-input bg-soft-green text-card-green focus-ring py-1 px-2 text-decoration-none border rounded-2" id="fakultas" value="<?php echo e($user->fakultas); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary bg-card-green hover:bg-soft-green">Update</button>
                </form>
            </section>
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
<?php /**PATH C:\Users\Femmy Friscilla\Downloads\Tubes-PWL-Darren-patch-2\resources\views/userUpdate.blade.php ENDPATH**/ ?>