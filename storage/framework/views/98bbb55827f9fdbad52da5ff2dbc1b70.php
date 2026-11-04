<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'Sayurku Bulehaaa'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --leaf: #2f7d32;
            --leaf-dark: #1d5d22;
            --cream: #fff8df;
            --sun: #ffd95a;
        }
        body {
            background:
                radial-gradient(circle at top left, rgba(255, 217, 90, .25), transparent 28rem),
                linear-gradient(180deg, #fffef6 0%, #eef8e8 100%);
            color: #1d2b16;
            font-size: 1.05rem;
            min-height: 100vh;
        }
        .buyer-shell { max-width: 1120px; }
        .buyer-nav {
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(47, 125, 50, .14);
            border-radius: 18px;
            box-shadow: 0 10px 24px rgba(47, 125, 50, .12);
        }
        .brand-mark { color: var(--leaf-dark); font-weight: 800; font-size: 1.45rem; }
        .nav-pill {
            color: var(--leaf-dark);
            text-decoration: none;
            font-weight: 700;
            padding: .65rem .9rem;
            border-radius: 999px;
        }
        .nav-pill.active, .nav-pill:hover { background: var(--leaf); color: #fff; }
        .btn-success, .bg-success { background-color: var(--leaf) !important; border-color: var(--leaf) !important; }
        .btn-success { box-shadow: inset 0 -3px 0 rgba(0, 0, 0, .15); }
        .hero-card {
            min-height: 300px;
            border-radius: 24px;
            background:
                linear-gradient(90deg, rgba(34, 94, 26, .08) 0%, rgba(34, 94, 26, .1) 100%),
                url('/images/hero-banner.png') center/cover;
            box-shadow: 0 16px 34px rgba(47, 125, 50, .18);
            overflow: hidden;
        }
        .admin-login-hero {
            min-height: 520px;
            border-radius: 20px;
            background:
                linear-gradient(90deg, rgba(21, 61, 25, .18), rgba(21, 61, 25, .04)),
                url('/images/admin-login.png') center/cover;
        }
        .hero-panel {
            background: rgba(29, 93, 34, .82);
            border-radius: 18px;
            color: #fff;
            backdrop-filter: blur(2px);
        }
        .search-box {
            background: rgba(255, 255, 255, .95);
            border: 2px solid rgba(255, 217, 90, .8);
            border-radius: 999px;
            padding: .8rem 1.2rem;
        }
        .feature-tile, .product-card, .promo-card, .order-card {
            background: rgba(255, 255, 255, .92);
            border: 1px solid #eadfb8;
            border-radius: 20px;
            box-shadow: 0 12px 24px rgba(91, 75, 28, .12);
        }
        .feature-icon {
            width: 86px;
            height: 86px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
        .feature-tile.promo-tile {
            background: linear-gradient(180deg, #fff3e6 0%, #ffe8d9 100%);
            border-color: #ffc29c;
        }
        .feature-tile.category-tile {
            background: linear-gradient(180deg, #f2ffe8 0%, #e4f8d2 100%);
            border-color: #b9e59b;
        }
        .feature-tile.flash-tile {
            background: linear-gradient(180deg, #fff8d7 0%, #ffef9c 100%);
            border-color: #ffd84f;
        }
        .feature-tile.recipe-tile {
            background: linear-gradient(180deg, #fff1e1 0%, #ffe2c1 100%);
            border-color: #f5bd7b;
        }
        .promo-card {
            background:
                linear-gradient(90deg, rgba(29, 93, 34, .08), rgba(29, 93, 34, .18)),
                url('/images/promo-banner.png') center/cover;
            color: #fff;
            min-height: 150px;
        }
        .promo-content {
            max-width: 520px;
            text-shadow: 0 2px 12px rgba(0, 0, 0, .35);
        }
        .product-photo { width: 100%; height: 170px; object-fit: cover; background: #edf7d7; border-radius: 16px 16px 0 0; }
        .product-placeholder {
            height: 170px;
            background: linear-gradient(135deg, #edf7d7, #fff6c7);
            border-radius: 16px 16px 0 0;
            color: var(--leaf);
            font-size: 3rem;
        }
        .status-step {
            border-left: 4px solid #d7e7c8;
            padding-left: 1rem;
        }
        .status-step.active { border-color: var(--leaf); }
        .table td, .table th { vertical-align: middle; }
    </style>
</head>
<body>
    <main class="container buyer-shell py-4">
        <nav class="buyer-nav p-3 mb-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <a class="brand-mark text-decoration-none" href="<?php echo e(route('catalog.index')); ?>">Sayurku Bulehaaa</a>
            <div class="d-flex flex-wrap gap-2">
                <a class="nav-pill <?php echo e(request()->routeIs('catalog.*') ? 'active' : ''); ?>" href="<?php echo e(route('catalog.index')); ?>">Belanja</a>
                <a class="nav-pill <?php echo e(request()->routeIs('cart.*') ? 'active' : ''); ?>" href="<?php echo e(route('cart.index')); ?>">Keranjang</a>
                <a class="nav-pill <?php echo e(request()->routeIs('buyer.orders.*') ? 'active' : ''); ?>" href="<?php echo e(route('buyer.orders.index')); ?>">Pesanan Saya</a>
                <a class="nav-pill <?php echo e(request()->routeIs('admin.login') ? 'active' : ''); ?>" href="<?php echo e(route('admin.login')); ?>">Admin</a>
            </div>
        </nav>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Mohon periksa kembali:</strong>
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/layouts/app.blade.php ENDPATH**/ ?>