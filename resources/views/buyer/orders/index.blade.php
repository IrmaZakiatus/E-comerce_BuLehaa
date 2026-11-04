@extends('layouts.app')

@section('content')
<div class="row g-4 align-items-start">
    <div class="col-lg-5">
        <div class="order-card p-4">
            <h1 class="h3 mb-2">Pesanan Saya</h1>
            <p class="text-muted">Masukkan nomor WhatsApp yang dipakai saat checkout untuk melihat riwayat dan status pesanan.</p>
            <form method="GET" action="{{ route('buyer.orders.index') }}" class="d-grid gap-3">
                <input class="form-control form-control-lg search-box" name="whatsapp" value="{{ request('whatsapp') }}" placeholder="Contoh: 08123456789">
                <button class="btn btn-success btn-lg rounded-pill">Cari Pesanan</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="d-grid gap-3">
            @forelse ($orders as $order)
                <a class="order-card p-4 text-decoration-none text-dark" href="{{ route('buyer.orders.show', $order) }}">
                    <div class="d-flex justify-content-between gap-3">
                        <div>
                            <div class="fw-bold fs-5">{{ $order->order_number }}</div>
                            <div class="text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                        </div>
                        <span class="badge bg-success align-self-start">{{ ucfirst($order->status) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <span>Total</span>
                        <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                    </div>
                </a>
            @empty
                <div class="order-card p-4">
                    <h2 class="h5">Belum ada pesanan ditemukan</h2>
                    <p class="text-muted mb-0">Jika baru checkout, pesanan akan muncul otomatis di perangkat ini. Jika memakai perangkat lain, cari dengan nomor WhatsApp.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
