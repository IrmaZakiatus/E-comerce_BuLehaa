

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<h1 class="h3 mb-4">Pesanan</h1>
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-4">
        <select class="form-select" name="status">
            <option value="">Semua status</option>
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e(ucfirst($status)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-2 d-grid"><button class="btn btn-success">Filter</button></div>
</form>
<div class="table-responsive bg-white rounded shadow-sm">
    <table class="table mb-0">
        <thead><tr><th>No.</th><th>Pembeli</th><th>WhatsApp</th><th>Total</th><th>Status</th><th></th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->order_number); ?></td>
                    <td><?php echo e($order->customer_name); ?></td>
                    <td><?php echo e($order->customer_whatsapp); ?></td>
                    <td>Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?></td>
                    <td><span class="badge bg-secondary"><?php echo e($order->status); ?></span></td>
                    <td><a class="btn btn-sm btn-outline-success" href="<?php echo e(route('admin.orders.show', $order)); ?>">Detail</a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="mt-3"><?php echo e($orders->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>