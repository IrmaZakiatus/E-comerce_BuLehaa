@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4">Checkout</h1>
<div class="row g-4">
    <div class="col-lg-7">
        <form method="POST" action="{{ route('checkout.store') }}" class="card shadow-sm">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input class="form-control form-control-lg" name="customer_name" value="{{ old('customer_name') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input class="form-control form-control-lg" name="customer_whatsapp" value="{{ old('customer_whatsapp') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control form-control-lg" name="customer_address" rows="3" required>{{ old('customer_address') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea class="form-control" name="note" rows="2">{{ old('note') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Metode Pengiriman</label>
                    <select class="form-select form-select-lg" name="delivery_method" required>
                        <option value="antar">Diantar ke alamat</option>
                        <option value="ambil_sendiri">Ambil sendiri</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label">Jadwal Pengiriman</label>
                    <input class="form-control form-control-lg" type="datetime-local" name="delivery_schedule" value="{{ old('delivery_schedule') }}">
                </div>
                <button class="btn btn-success btn-lg w-100">Buat Pesanan</button>
            </div>
        </form>
    </div>
    <div class="col-lg-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="h5">Ringkasan</h2>
                @foreach ($cartItems as $item)
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                        <strong>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</strong>
                    </div>
                @endforeach
                <div class="d-flex justify-content-between pt-3 fs-5">
                    <strong>Total</strong>
                    <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
