@extends('layouts.app')

@section('content')
<a class="btn btn-link ps-0 mb-3" href="{{ route('buyer.orders.index') }}">Kembali ke Pesanan Saya</a>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="order-card p-4">
            <h1 class="h3">Status Pesanan</h1>
            <p class="mb-1">Nomor pesanan: <strong>{{ $order->order_number }}</strong></p>
            <p class="text-muted">Atas nama {{ $order->customer_name }}</p>

            <div class="d-grid gap-3 my-4">
                @foreach ($statuses as $status)
                    <div class="status-step {{ array_search($status, $statuses) <= array_search($order->status, $statuses) ? 'active' : '' }}">
                        <div class="fw-bold">{{ ucfirst($status) }}</div>
                        <div class="text-muted">
                            @if ($status === 'baru')
                                Pesanan sudah diterima toko.
                            @elseif ($status === 'diproses')
                                Sayuran sedang disiapkan.
                            @elseif ($status === 'dikirim')
                                Pesanan sedang menuju alamat Anda.
                            @else
                                Pesanan sudah selesai.
                            @endif
                        </div>
                    </div>
                @endforeach
                @if ($order->status === 'batal')
                    <div class="alert alert-danger mb-0">Pesanan ini dibatalkan.</div>
                @endif
            </div>

            <form method="POST" action="{{ route('checkout.payment-proof', $order) }}" enctype="multipart/form-data">
                @csrf
                <label class="form-label fw-bold">Upload bukti pembayaran</label>
                <div class="row g-2">
                    <div class="col-md-8">
                        <input class="form-control form-control-lg" type="file" name="payment_proof" accept="image/*" required>
                    </div>
                    <div class="col-md-4 d-grid">
                        <button class="btn btn-success btn-lg rounded-pill">Upload</button>
                    </div>
                </div>
                @if ($order->payment_proof)
                    <div class="alert alert-success mt-3 mb-0">Bukti pembayaran sudah diterima.</div>
                @endif
            </form>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="order-card p-4">
            <h2 class="h5">Isi Pesanan</h2>
            @foreach ($order->items as $item)
                <div class="border-bottom py-2">
                    <div class="fw-bold">{{ $item->product_name }}</div>
                    <div>{{ $item->quantity }} {{ $item->unit }} x Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                    <div class="text-success fw-bold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                </div>
            @endforeach
            <div class="d-flex justify-content-between pt-3 fs-5">
                <strong>Total</strong>
                <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
            </div>
        </div>
    </div>
</div>
@endsection
