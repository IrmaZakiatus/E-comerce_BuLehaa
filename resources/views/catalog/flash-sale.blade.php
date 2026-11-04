@extends('layouts.app')

@section('content')
<section class="promo-card p-4 p-lg-5 mb-4 d-flex align-items-center justify-content-end">
    <div class="promo-content">
        <h1 class="display-6 fw-bold">Flash Sale Sayur Segar</h1>
        <p class="fs-4 fw-bold mb-0">Harga spesial untuk produk pilihan hari ini.</p>
    </div>
</section>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h4 fw-bold mb-0">Produk Flash Sale</h2>
    <a class="btn btn-outline-success rounded-pill" href="{{ route('catalog.index') }}">Kembali Belanja</a>
</div>

<div class="row g-3">
    @forelse ($products as $product)
        <div class="col-6 col-lg-3">
            <div class="product-card h-100 overflow-hidden">
                @if ($product->photo)
                    <img class="product-photo" src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
                @else
                    <div class="product-placeholder d-flex align-items-center justify-content-center fw-bold">{{ strtoupper(substr($product->name, 0, 1)) }}</div>
                @endif
                <div class="p-3">
                    <div class="small text-danger fw-bold">Flash Sale</div>
                    <h3 class="h5 fw-bold mb-1">{{ $product->name }}</h3>
                    <div class="text-muted text-decoration-line-through">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    <p class="fs-5 text-success fw-bold mb-1">Rp {{ number_format($product->effective_price, 0, ',', '.') }}</p>
                    @if ($product->sale_ends_at)
                        <div class="small text-muted mb-3">Sampai {{ $product->sale_ends_at->format('d/m H:i') }}</div>
                    @endif
                    <form method="POST" action="{{ route('cart.store', $product) }}" class="d-grid gap-2">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button class="btn btn-success rounded-pill fw-bold">Beli Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="order-card p-4">Belum ada produk flash sale.</div>
        </div>
    @endforelse
</div>

<div class="mt-4">{{ $products->links() }}</div>
@endsection
