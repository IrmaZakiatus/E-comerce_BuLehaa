

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Kategori</h1>
    <a class="btn btn-success" href="<?php echo e(route('admin.categories.create')); ?>">Tambah Kategori</a>
</div>

<div class="table-responsive bg-white rounded shadow-sm">
    <table class="table mb-0">
        <thead><tr><th>Nama</th><th>Produk</th><th>Status</th><th></th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->products_count); ?></td>
                    <td><?php echo e($category->is_active ? 'Aktif' : 'Tidak aktif'); ?></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-success" href="<?php echo e(route('admin.categories.edit', $category)); ?>">Edit</a>
                        <form class="d-inline" method="POST" action="<?php echo e(route('admin.categories.destroy', $category)); ?>" onsubmit="return confirm('Hapus kategori ini?')">
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
<div class="mt-3"><?php echo e($categories->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>