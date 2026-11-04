<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Resep</h1>
    <a class="btn btn-success" href="<?php echo e(route('admin.recipes.create')); ?>">Tambah Resep</a>
</div>

<div class="table-responsive bg-white rounded shadow-sm">
    <table class="table mb-0">
        <thead><tr><th>Judul</th><th>Waktu</th><th>Status</th><th></th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($recipe->title); ?></td>
                    <td><?php echo e($recipe->cooking_time ? $recipe->cooking_time . ' menit' : '-'); ?></td>
                    <td><?php echo e($recipe->is_active ? 'Aktif' : 'Tidak aktif'); ?></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.recipes.show', $recipe)); ?>">Detail</a>
                        <a class="btn btn-sm btn-outline-success" href="<?php echo e(route('admin.recipes.edit', $recipe)); ?>">Edit</a>
                        <form class="d-inline" method="POST" action="<?php echo e(route('admin.recipes.destroy', $recipe)); ?>" onsubmit="return confirm('Hapus resep ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="mt-3"><?php echo e($recipes->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/recipes/index.blade.php ENDPATH**/ ?>