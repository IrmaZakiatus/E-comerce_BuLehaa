@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4">Keranjang Belanja</h1>

@if (count($cartItems))
    <div class="table-responsive bg-white rounded shadow-sm">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th style="width: 180px;">Jumlah</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr data-cart-row data-price="{{ $item['price'] }}">
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }} / {{ $item['unit'] }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.update', $item['product_id']) }}" class="cart-quantity-form">
                                @csrf
                                @method('PATCH')
                                <input class="form-control cart-quantity-input" type="number" min="1" max="{{ $item['max_stock'] }}" name="quantity" value="{{ $item['quantity'] }}" aria-label="Jumlah {{ $item['name'] }}">
                            </form>
                        </td>
                        <td data-cart-subtotal>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                        <td>
                            <form method="POST" action="{{ route('cart.destroy', $item['product_id']) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mt-4">
        <h2 class="h4 mb-0">Total: <span data-cart-total>Rp {{ number_format($total, 0, ',', '.') }}</span></h2>
        <a class="btn btn-success btn-lg" href="{{ route('checkout.create') }}">Lanjut Checkout</a>
    </div>
@else
    <div class="alert alert-info">Keranjang masih kosong.</div>
    <a class="btn btn-success" href="{{ route('catalog.index') }}">Belanja Sekarang</a>
@endif

@if (count($cartItems))
    <script>
        const rupiah = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0,
        });

        const updateTotal = () => {
            const total = [...document.querySelectorAll('[data-cart-row]')].reduce((sum, row) => {
                const price = Number(row.dataset.price);
                const quantity = Number(row.querySelector('.cart-quantity-input').value || 1);
                return sum + (price * quantity);
            }, 0);

            document.querySelector('[data-cart-total]').textContent = rupiah.format(total).replace('IDR', 'Rp');
        };

        document.querySelectorAll('.cart-quantity-input').forEach((input) => {
            let timer;

            input.addEventListener('input', () => {
                const row = input.closest('[data-cart-row]');
                const min = Number(input.min || 1);
                const max = Number(input.max || input.value);
                const quantity = Math.max(min, Math.min(Number(input.value || min), max));

                input.value = quantity;
                row.querySelector('[data-cart-subtotal]').textContent = rupiah.format(Number(row.dataset.price) * quantity).replace('IDR', 'Rp');
                updateTotal();

                clearTimeout(timer);
                timer = setTimeout(async () => {
                    const form = input.closest('form');
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                        },
                        body: new FormData(form),
                    });

                    if (!response.ok) {
                        window.location.reload();
                    }
                }, 350);
            });
        });
    </script>
@endif
@endsection
