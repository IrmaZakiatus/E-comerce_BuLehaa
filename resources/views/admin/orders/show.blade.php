@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<a class="btn btn-link ps-0 mb-3" href="{{ route('admin.orders.index') }}">Kembali</a>
<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="h3">Pesanan {{ $order->order_number }}</h1>
                <p><strong>Pembeli:</strong> {{ $order->customer_name }}</p>
                <p><strong>WhatsApp:</strong> {{ $order->customer_whatsapp }}</p>
                <p><strong>Alamat:</strong><br>{{ $order->customer_address }}</p>
                <p><strong>Catatan:</strong> {{ $order->note ?: '-' }}</p>
                <p><strong>Pengiriman:</strong> {{ str_replace('_', ' ', $order->delivery_method) }}</p>
                <p><strong>Jadwal:</strong> {{ $order->delivery_schedule?->format('d/m/Y H:i') ?: '-' }}</p>
                @if ($order->payment_proof)
                    <p><strong>Bukti pembayaran:</strong></p>
                    <img class="img-fluid rounded" style="max-width: 360px;" src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti pembayaran">
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                    @csrf
                    @method('PATCH')
                    <label class="form-label">Status Pesanan</label>
                    <select class="form-select form-select-lg mb-3" name="status">
                        @foreach ($statuses as $status)
                            <option value="{{ $status }}" @selected($order->status === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success btn-lg w-100">Ubah Status</button>
                </form>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="h5">Item Pesanan</h2>
                @foreach ($order->items as $item)
                    <div class="border-bottom py-2">
                        <div class="fw-semibold">{{ $item->product_name }}</div>
                        <div>{{ $item->quantity }} {{ $item->unit }} x Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                        <div class="fw-bold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-between pt-3 fs-5">
                    <strong>Total</strong>
                    <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
