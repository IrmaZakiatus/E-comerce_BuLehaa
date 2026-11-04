<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h1 class="h3 mb-4">Edit Resep</h1>
<form method="POST" action="<?php echo e(route('admin.recipes.update', $recipe)); ?>" enctype="multipart/form-data" class="card shadow-sm">
    <?php echo method_field('PATCH'); ?>
    <?php echo $__env->make('admin.recipes.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/recipes/edit.blade.php ENDPATH**/ ?>