@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Dashboard Admin</h1>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Pesanan Hari Ini</div><div class="fs-3 fw-bold">{{ $ordersToday }}</div></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Penjualan Hari Ini</div><div class="fs-3 fw-bold">Rp {{ number_format($dailySales, 0, ',', '.') }}</div></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Pesanan Baru</div><div class="fs-3 fw-bold">{{ $newOrders }}</div></div></div></div>
    <div class="col-md-3"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Stok Menipis</div><div class="fs-3 fw-bold">{{ $lowStockProducts }}</div></div></div></div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="h5">Pesanan Terbaru</h2>
        <div class="table-responsive">
            <table class="table">
                <thead><tr><th>No.</th><th>Pembeli</th><th>Total</th><th>Status</th><th></th></tr></thead>
                <tbody>
                    @forelse ($latestOrders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td><span class="badge bg-secondary">{{ $order->status }}</span></td>
                            <td><a class="btn btn-sm btn-outline-success" href="{{ route('admin.orders.show', $order) }}">Detail</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5">Belum ada pesanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
