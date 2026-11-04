@extends('layouts.app')

@section('content')
<a href="{{ route('catalog.index') }}" class="btn btn-link ps-0 mb-3">Kembali ke katalog</a>
<div class="row g-4">
    <div class="col-md-5">
        @if ($product->photo)
            <img class="img-fluid rounded shadow-sm w-100" src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
        @else
            <div class="rounded bg-white border d-flex align-items-center justify-content-center text-success fw-semibold" style="height: 320px;">Foto Produk</div>
        @endif
    </div>
    <div class="col-md-7">
        <div class="small text-muted">{{ $product->category->name }}</div>
        <h1 class="h2">{{ $product->name }}</h1>
        <p class="fs-4 text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }} / {{ $product->unit }}</p>
        <p>{{ $product->description ?: 'Belum ada deskripsi.' }}</p>
        <p class="text-muted">Stok tersedia: {{ $product->stock }}</p>
        <form method="POST" action="{{ route('cart.store', $product) }}" class="row g-2">
            @csrf
            <div class="col-5 col-md-3">
                <input class="form-control form-control-lg" type="number" min="1" max="{{ $product->stock }}" name="quantity" value="1">
            </div>
            <div class="col-7 col-md-5 d-grid">
                <button class="btn btn-success btn-lg">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection
