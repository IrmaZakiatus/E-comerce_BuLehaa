<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('catalog.index')); ?>" class="btn btn-link ps-0 mb-3">Kembali ke katalog</a>
<div class="row g-4">
    <div class="col-md-5">
        <?php if($product->photo): ?>
            <img class="img-fluid rounded shadow-sm w-100" src="<?php echo e(asset('storage/' . $product->photo)); ?>" alt="<?php echo e($product->name); ?>">
        <?php else: ?>
            <div class="rounded bg-white border d-flex align-items-center justify-content-center text-success fw-semibold" style="height: 320px;">Foto Produk</div>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <div class="small text-muted"><?php echo e($product->category->name); ?></div>
        <h1 class="h2"><?php echo e($product->name); ?></h1>
        <p class="fs-4 text-success fw-bold">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?> / <?php echo e($product->unit); ?></p>
        <p><?php echo e($product->description ?: 'Belum ada deskripsi.'); ?></p>
        <p class="text-muted">Stok tersedia: <?php echo e($product->stock); ?></p>
        <form method="POST" action="<?php echo e(route('cart.store', $product)); ?>" class="row g-2">
            <?php echo csrf_field(); ?>
            <div class="col-5 col-md-3">
                <input class="form-control form-control-lg" type="number" min="1" max="<?php echo e($product->stock); ?>" name="quantity" value="1">
            </div>
            <div class="col-7 col-md-5 d-grid">
                <button class="btn btn-success btn-lg">Tambah</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/catalog/show.blade.php ENDPATH**/ ?>