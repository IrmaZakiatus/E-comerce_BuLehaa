@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<a class="btn btn-link ps-0 mb-3" href="{{ route('admin.products.index') }}">Kembali</a>
<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h3">{{ $product->name }}</h1>
        <p class="text-muted">{{ $product->category->name }}</p>
        <p>{{ $product->description }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }} / {{ $product->unit }}</p>
        <p><strong>Stok:</strong> {{ $product->stock }}</p>
        <p><strong>Status:</strong> {{ $product->is_active ? 'Aktif' : 'Tidak aktif' }}</p>
        @if ($product->photo)
            <img class="img-fluid rounded" style="max-width: 360px;" src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}">
        @endif
    </div>
</div>
@endsection
