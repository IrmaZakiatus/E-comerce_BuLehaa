@extends('layouts.app')

@section('content')
<section class="hero-card d-flex align-items-end align-items-lg-center mb-4">
    <div class="container-fluid p-4 p-lg-5">
        <div class="row justify-content-start">
            <div class="col-lg-6">
                <div class="hero-panel p-4">
                    <h1 class="display-6 fw-bold mb-2">Selamat Datang, Bu!</h1>
                    <p class="fs-5 mb-4">Belanja sayur segar untuk masakan rumah hari ini.</p>
                    <form method="GET" action="{{ route('catalog.index') }}" class="d-flex gap-2">
                        <input class="form-control form-control-lg search-box" type="search" name="search" value="{{ request('search') }}" placeholder="Cari sayur segar...">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <button class="btn btn-warning btn-lg rounded-pill px-4">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <a class="feature-tile promo-tile d-block text-center text-decoration-none text-dark p-4 h-100" href="#produk">
            <img class="feature-icon" src="{{ asset('images/icon-promosi.png') }}" alt="Promo">
            <div class="fs-5 fw-bold mt-2">Promo</div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a class="feature-tile category-tile d-block text-center text-decoration-none text-dark p-4 h-100" href="#kategori">
            <img class="feature-icon" src="{{ asset('images/icon-kategori.png') }}" alt="Kategori">
            <div class="fs-5 fw-bold mt-2">Kategori</div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a class="feature-tile flash-tile d-block text-center text-decoration-none text-dark p-4 h-100" href="{{ route('catalog.flash-sale') }}">
            <img class="feature-icon" src="{{ asset('images/icon-flashsale.png') }}" alt="Flash Sale">
            <div class="fs-5 fw-bold mt-2">Flash Sale</div>
        </a>
    </div>
    <div class="col-6 col-md-3">
        <a class="feature-tile recipe-tile d-block text-center text-decoration-none text-dark p-4 h-100" href="{{ route('recipes.index') }}">
            <img class="feature-icon" src="{{ asset('images/icon-resep.png') }}" alt="Resep">
            <div class="fs-5 fw-bold mt-2">Resep</div>
        </a>
    </div>
</section>

<section class="promo-card p-4 p-lg-5 mb-4 d-flex flex-column flex-md-row justify-content-end align-items-md-center gap-3">
    <div class="promo-content">
        <h2 class="h1 fw-bold mb-2">Promo Segar Hari Ini</h2>
        <p class="fs-3 fw-bold mb-0">Diskon pilihan sampai 50%</p>
        <a class="btn btn-light btn-lg rounded-pill px-4 fw-bold mt-3" href="#produk">Lihat Semua</a>
    </div>
</section>

<section id="kategori" class="mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Pilih Kategori</h2>
        @if (request('category') || request('search'))
            <a class="btn btn-outline-success rounded-pill" href="{{ route('catalog.index') }}">Reset</a>
        @endif
    </div>
    <div class="d-flex gap-2 overflow-auto pb-2">
        <a class="btn rounded-pill {{ request('category') ? 'btn-outline-success' : 'btn-success' }}" href="{{ route('catalog.index', request('search') ? ['search' => request('search')] : []) }}">Semua</a>
        @foreach ($categories as $category)
            <a class="btn rounded-pill {{ request('category') === $category->slug ? 'btn-success' : 'btn-outline-success' }}" href="{{ route('catalog.index', array_filter(['category' => $category->slug, 'search' => request('search')])) }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</section>

<section id="produk">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Sayuran Pilihan</h2>
        <a class="btn btn-outline-success rounded-pill" href="{{ route('cart.index') }}">Lihat Keranjang</a>
    </div>

    <div class="row g-3">
        @forelse ($products as $product)
            <div class="col-6 col-lg-3">
                <div class="product-card h-100 overflow-hidden">
                    @if ($product->photo)
                        <img class="product-photo" src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
                    @else
                        <div class="product-placeholder d-flex align-items-center justify-content-center fw-bold">
                            {{ strtoupper(substr($product->name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="p-3">
                        <div class="small text-success fw-bold">{{ $product->category->name }}</div>
                        <h3 class="h5 fw-bold mb-1">{{ $product->name }}</h3>
                        <div class="text-muted small mb-2">Stok {{ $product->stock }} {{ $product->unit }}</div>
                        @if ($product->is_flash_sale && $product->sale_price)
                            <div class="text-muted text-decoration-line-through small">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        @endif
                        <p class="fs-5 text-success fw-bold mb-3">Rp {{ number_format($product->effective_price, 0, ',', '.') }}</p>
                        <form method="POST" action="{{ route('cart.store', $product) }}" class="d-grid gap-2">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn btn-success rounded-pill fw-bold">Beli</button>
                            <a class="btn btn-outline-success rounded-pill" href="{{ route('catalog.show', $product) }}">Detail</a>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="order-card p-4">Produk belum tersedia.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">{{ $products->links() }}</div>
</section>
@endsection
