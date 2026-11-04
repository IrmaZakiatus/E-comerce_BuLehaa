<div class="admin-nav bg-white shadow-sm p-2 mb-4">
    <div class="nav nav-pills flex-column flex-md-row gap-2">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active bg-success' : 'text-success' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active bg-success' : 'text-success' }}" href="{{ route('admin.categories.index') }}">Kategori</a>
        <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active bg-success' : 'text-success' }}" href="{{ route('admin.products.index') }}">Produk</a>
        <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active bg-success' : 'text-success' }}" href="{{ route('admin.orders.index') }}">Pesanan</a>
        <a class="nav-link {{ request()->routeIs('admin.recipes.*') ? 'active bg-success' : 'text-success' }}" href="{{ route('admin.recipes.index') }}">Resep</a>
    </div>
</div>
