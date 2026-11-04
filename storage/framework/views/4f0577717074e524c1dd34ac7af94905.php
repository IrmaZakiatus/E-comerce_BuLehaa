<?php $__env->startSection('content'); ?>
<section class="promo-card p-4 p-lg-5 mb-4 d-flex align-items-center justify-content-end">
    <div class="promo-content">
        <h1 class="display-6 fw-bold">Flash Sale Sayur Segar</h1>
        <p class="fs-4 fw-bold mb-0">Harga spesial untuk produk pilihan hari ini.</p>
    </div>
</section>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h4 fw-bold mb-0">Produk Flash Sale</h2>
    <a class="btn btn-outline-success rounded-pill" href="<?php echo e(route('catalog.index')); ?>">Kembali Belanja</a>
</div>

<div class="row g-3">
    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-6 col-lg-3">
            <div class="product-card h-100 overflow-hidden">
                <?php if($product->photo): ?>
                    <img class="product-photo" src="<?php echo e(asset('storage/' . $product->photo)); ?>" alt="<?php echo e($product->name); ?>">
                <?php else: ?>
                    <div class="product-placeholder d-flex align-items-center justify-content-center fw-bold"><?php echo e(strtoupper(substr($product->name, 0, 1))); ?></div>
                <?php endif; ?>
                <div class="p-3">
                    <div class="small text-danger fw-bold">Flash Sale</div>
                    <h3 class="h5 fw-bold mb-1"><?php echo e($product->name); ?></h3>
                    <div class="text-muted text-decoration-line-through">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></div>
                    <p class="fs-5 text-success fw-bold mb-1">Rp <?php echo e(number_format($product->effective_price, 0, ',', '.')); ?></p>
                    <?php if($product->sale_ends_at): ?>
                        <div class="small text-muted mb-3">Sampai <?php echo e($product->sale_ends_at->format('d/m H:i')); ?></div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('cart.store', $product)); ?>" class="d-grid gap-2">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="quantity" value="1">
                        <button class="btn btn-success rounded-pill fw-bold">Beli Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="order-card p-4">Belum ada produk flash sale.</div>
        </div>
    <?php endif; ?>
</div>

<div class="mt-4"><?php echo e($products->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/catalog/flash-sale.blade.php ENDPATH**/ ?>