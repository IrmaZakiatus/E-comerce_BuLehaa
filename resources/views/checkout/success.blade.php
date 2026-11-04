@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h1 class="h3 text-success">Pesanan Berhasil Dibuat</h1>
        <p>Nomor pesanan: <strong>{{ $order->order_number }}</strong></p>
        <p>Total pembayaran: <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong></p>
        <p>Status saat ini: <span class="badge bg-success">{{ $order->status }}</span></p>

        <hr>
        <h2 class="h5">Upload Bukti Pembayaran</h2>
        <form method="POST" action="{{ route('checkout.payment-proof', $order) }}" enctype="multipart/form-data" class="row g-2">
            @csrf
            <div class="col-md-8">
                <input class="form-control form-control-lg" type="file" name="payment_proof" accept="image/*" required>
            </div>
            <div class="col-md-4 d-grid">
                <button class="btn btn-success btn-lg">Upload</button>
            </div>
        </form>

        @if ($order->payment_proof)
            <div class="alert alert-success mt-3">Bukti pembayaran sudah diterima.</div>
        @endif

        <div class="mt-4">
            <a class="btn btn-success btn-lg rounded-pill" href="{{ route('buyer.orders.show', $order) }}">Lihat Status Pesanan</a>
            <a class="btn btn-outline-success btn-lg rounded-pill" href="{{ route('catalog.index') }}">Belanja Lagi</a>
        </div>
    </div>
</div>
@endsection
