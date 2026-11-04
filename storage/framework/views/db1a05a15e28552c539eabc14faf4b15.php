<div class="admin-nav bg-white shadow-sm p-2 mb-4">
    <div class="nav nav-pills flex-column flex-md-row gap-2">
        <a class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active bg-success' : 'text-success'); ?>" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
        <a class="nav-link <?php echo e(request()->routeIs('admin.categories.*') ? 'active bg-success' : 'text-success'); ?>" href="<?php echo e(route('admin.categories.index')); ?>">Kategori</a>
        <a class="nav-link <?php echo e(request()->routeIs('admin.products.*') ? 'active bg-success' : 'text-success'); ?>" href="<?php echo e(route('admin.products.index')); ?>">Produk</a>
        <a class="nav-link <?php echo e(request()->routeIs('admin.orders.*') ? 'active bg-success' : 'text-success'); ?>" href="<?php echo e(route('admin.orders.index')); ?>">Pesanan</a>
        <a class="nav-link <?php echo e(request()->routeIs('admin.recipes.*') ? 'active bg-success' : 'text-success'); ?>" href="<?php echo e(route('admin.recipes.index')); ?>">Resep</a>
    </div>
</div>
<?php /**PATH C:\Aplikasi-e-commerce-BuLeha\resources\views/admin/partials/nav.blade.php ENDPATH**/ ?>