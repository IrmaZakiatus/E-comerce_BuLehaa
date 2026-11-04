@extends('layouts.admin')

@section('content')
@include('admin.partials.nav')

<h1 class="h3 mb-4">Pesanan</h1>
<form method="GET" class="row g-2 mb-3">
    <div class="col-md-4">
        <select class="form-select" name="status">
            <option value="">Semua status</option>
            @foreach ($statuses as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2 d-grid"><button class="btn btn-success">Filter</button></div>
</form>
<div class="table-responsive bg-white rounded shadow-sm">
    <table class="table mb-0">
        <thead><tr><th>No.</th><th>Pembeli</th><th>WhatsApp</th><th>Total</th><th>Status</th><th></th></tr></thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_whatsapp }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td><span class="badge bg-secondary">{{ $order->status }}</span></td>
                    <td><a class="btn btn-sm btn-outline-success" href="{{ route('admin.orders.show', $order) }}">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-3">{{ $orders->links() }}</div>
@endsection
