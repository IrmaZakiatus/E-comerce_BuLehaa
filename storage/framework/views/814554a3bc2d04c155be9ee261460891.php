

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Produk</h1>
    <a class="btn btn-success" href="<?php echo e(route('admin.products.create')); ?>">Tambah Produk</a>
</div>

<div class="table-responsive bg-white rounded shadow-sm">
    <table class="table mb-0">
        <thead><tr><th>Produk</th><th>Kategori</th><th>Harga</th><th>Flash Sale</th><th>Stok</th><th>Status</th><th></th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->category->name); ?></td>
                    <td>Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?> / <?php echo e($product->unit); ?></td>
                    <td>
                        <?php if($product->is_flash_sale && $product->sale_price): ?>
                            Rp <?php echo e(number_format($product->sale_price, 0, ',', '.')); ?>

                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($product->stock); ?></td>
                    <td><?php echo e($product->is_active ? 'Aktif' : 'Tidak aktif'); ?></td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('admin.products.show', $product)); ?>">Detail</a>
                        <a class="btn btn-sm btn-outline-success" href="<?php echo e(route('admin.products.edit', $product)); ?>">Edit</a>
                        <form class="d-inline" method="POST" action="<?php echo e(route('admin.products.destroy', $product)); ?>" onsubmit="return confirm('Hapus produk ini?')">
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
<div class="mt-3"><?php echo e($products->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/products/index.blade.php ENDPATH**/ ?>