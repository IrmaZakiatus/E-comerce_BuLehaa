<?php $__env->startSection('content'); ?>
<div class="row g-4 align-items-start">
    <div class="col-lg-5">
        <div class="order-card p-4">
            <h1 class="h3 mb-2">Pesanan Saya</h1>
            <p class="text-muted">Masukkan nomor WhatsApp yang dipakai saat checkout untuk melihat riwayat dan status pesanan.</p>
            <form method="GET" action="<?php echo e(route('buyer.orders.index')); ?>" class="d-grid gap-3">
                <input class="form-control form-control-lg search-box" name="whatsapp" value="<?php echo e(request('whatsapp')); ?>" placeholder="Contoh: 08123456789">
                <button class="btn btn-success btn-lg rounded-pill">Cari Pesanan</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="d-grid gap-3">
            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a class="order-card p-4 text-decoration-none text-dark" href="<?php echo e(route('buyer.orders.show', $order)); ?>">
                    <div class="d-flex justify-content-between gap-3">
                        <div>
                            <div class="fw-bold fs-5"><?php echo e($order->order_number); ?></div>
                            <div class="text-muted"><?php echo e($order->created_at->format('d/m/Y H:i')); ?></div>
                        </div>
                        <span class="badge bg-success align-self-start"><?php echo e(ucfirst($order->status)); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <span>Total</span>
                        <strong>Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?></strong>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="order-card p-4">
                    <h2 class="h5">Belum ada pesanan ditemukan</h2>
                    <p class="text-muted mb-0">Jika baru checkout, pesanan akan muncul otomatis di perangkat ini. Jika memakai perangkat lain, cari dengan nomor WhatsApp.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/buyer/orders/index.blade.php ENDPATH**/ ?>