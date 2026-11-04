<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold mb-1">Ide Resep Sayuran</h1>
        <p class="text-muted mb-0">Inspirasi masakan dari admin toko untuk menu harian.</p>
    </div>
    <a class="btn btn-outline-success rounded-pill" href="<?php echo e(route('catalog.index')); ?>">Belanja Sayur</a>
</div>

<div class="row g-3">
    <?php $__empty_1 = true; $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-6 col-lg-4">
            <a class="product-card d-block h-100 text-decoration-none text-dark overflow-hidden" href="<?php echo e(route('recipes.show', $recipe)); ?>">
                <?php if($recipe->photo): ?>
                    <img class="product-photo" src="<?php echo e(asset('storage/' . $recipe->photo)); ?>" alt="<?php echo e($recipe->title); ?>">
                <?php else: ?>
                    <div class="product-placeholder d-flex align-items-center justify-content-center fw-bold">R</div>
                <?php endif; ?>
                <div class="p-3">
                    <h2 class="h5 fw-bold"><?php echo e($recipe->title); ?></h2>
                    <p class="text-muted"><?php echo e($recipe->description); ?></p>
                    <?php if($recipe->cooking_time): ?>
                        <div class="small text-success fw-bold"><?php echo e($recipe->cooking_time); ?> menit</div>
                    <?php endif; ?>
                </div>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12"><div class="order-card p-4">Belum ada resep dari admin.</div></div>
    <?php endif; ?>
</div>

<div class="mt-4"><?php echo e($recipes->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/recipes/index.blade.php ENDPATH**/ ?>