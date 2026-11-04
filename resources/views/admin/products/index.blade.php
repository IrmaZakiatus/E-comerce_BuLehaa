@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Produk</h1>
    <a class="btn btn-success" href="{{ route('admin.products.create') }}">Tambah Produk</a>
</div>

<div class="table-responsive bg-white rounded shadow-sm">
    <table class="table mb-0">
        <thead><tr><th>Produk</th><th>Kategori</th><th>Harga</th><th>Flash Sale</th><th>Stok</th><th>Status</th><th></th></tr></thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }} / {{ $product->unit }}</td>
                    <td>
                        @if ($product->is_flash_sale && $product->sale_price)
                            Rp {{ number_format($product->sale_price, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->is_active ? 'Aktif' : 'Tidak aktif' }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.products.show', $product) }}">Detail</a>
                        <a class="btn btn-sm btn-outline-success" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-3">{{ $products->links() }}</div>
@endsection
