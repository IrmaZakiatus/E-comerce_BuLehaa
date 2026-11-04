

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Dashboard Admin</h1>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Pesanan Hari Ini</div><div class="fs-3 fw-bold"><?php echo e($ordersToday); ?></div></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Penjualan Hari Ini</div><div class="fs-3 fw-bold">Rp <?php echo e(number_format($dailySales, 0, ',', '.')); ?></div></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Pesanan Baru</div><div class="fs-3 fw-bold"><?php echo e($newOrders); ?></div></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Stok Menipis</div><div class="fs-3 fw-bold"><?php echo e($lowStockProducts); ?></div></div></div></div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="h5">Pesanan Terbaru</h2>
        <div class="table-responsive">
            <table class="table">
                <thead><tr><th>No.</th><th>Pembeli</th><th>Total</th><th>Status</th><th></th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $latestOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($order->order_number); ?></td>
                            <td><?php echo e($order->customer_name); ?></td>
                            <td>Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?></td>
                            <td><span class="badge bg-secondary"><?php echo e($order->status); ?></span></td>
                            <td><a class="btn btn-sm btn-outline-success" href="<?php echo e(route('admin.orders.show', $order)); ?>">Detail</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5">Belum ada pesanan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>