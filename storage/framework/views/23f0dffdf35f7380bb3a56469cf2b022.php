<?php $__env->startSection('content'); ?>
<h1 class="h3 mb-4">Checkout</h1>
<div class="row g-4">
    <div class="col-lg-7">
        <form method="POST" action="<?php echo e(route('checkout.store')); ?>" class="card shadow-sm">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control form-control-lg" name="customer_name" value="<?php echo e(old('customer_name')); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input class="form-control form-control-lg" name="customer_whatsapp" value="<?php echo e(old('customer_whatsapp')); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control form-control-lg" name="customer_address" rows="3" required><?php echo e(old('customer_address')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea class="form-control" name="note" rows="2"><?php echo e(old('note')); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Metode Pengiriman</label>
                    <select class="form-select form-select-lg" name="delivery_method" required>
                        <option value="antar">Diantar ke alamat</option>
                        <option value="ambil_sendiri">Ambil sendiri</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label">Jadwal Pengiriman</label>
                    <input class="form-control form-control-lg" type="datetime-local" name="delivery_schedule" value="<?php echo e(old('delivery_schedule')); ?>">
                </div>
                <button class="btn btn-success btn-lg w-100">Buat Pesanan</button>
            </div>
        </form>
    </div>
    <div class="col-lg-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="h5">Ringkasan</h2>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span><?php echo e($item['name']); ?> x <?php echo e($item['quantity']); ?></span>
                        <strong>Rp <?php echo e(number_format($item['subtotal'], 0, ',', '.')); ?></strong>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex justify-content-between pt-3 fs-5">
                    <strong>Total</strong>
                    <strong>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/checkout/create.blade.php ENDPATH**/ ?>