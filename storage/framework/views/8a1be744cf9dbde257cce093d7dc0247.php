<?php $__env->startSection('content'); ?>
<div class="row g-4 align-items-stretch">
    <div class="col-lg-6">
        <section class="admin-login-hero h-100 d-flex align-items-end">
            <div class="p-4 p-lg-5 w-100">
                <div class="hero-panel p-4">
                    <h1 class="h2 fw-bold mb-2">Login Admin</h1>
                    <p class="mb-0">Kelola produk, flash sale, pesanan, kategori, dan resep dari satu tempat.</p>
                </div>
            </div>
        </section>
    </div>
    <div class="col-lg-6">
        <div class="order-card p-4 p-lg-5 h-100">
            <div class="mb-4">
                <div class="small text-success fw-bold text-uppercase">Panel Toko</div>
                <h2 class="h3 fw-bold mb-1">Masuk ke Admin</h2>
                <p class="text-muted mb-0">Gunakan akun admin toko sayur.</p>
            </div>

            <form method="POST" action="<?php echo e(route('admin.login.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input class="form-control form-control-lg search-box rounded-4" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <input class="form-control form-control-lg search-box rounded-4" type="password" name="password" required>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ingat saya</label>
                </div>
                <button class="btn btn-success btn-lg rounded-pill w-100">Masuk Admin</button>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>