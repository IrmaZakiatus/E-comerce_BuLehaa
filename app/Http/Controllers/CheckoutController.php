<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function create(): View|RedirectResponse
    {
        if (empty(session('cart', []))) {
            return redirect()->route('catalog.index')->with('success', 'Silakan pilih produk lebih dulu.');
        }

        return view('checkout.create', [
            'cartItems' => $this->cartItems(),
            'total' => $this->cartTotal(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('catalog.index');
        }

        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_whatsapp' => ['required', 'string', 'max:30'],
            'customer_address' => ['required', 'string'],
            'note' => ['nullable', 'string'],
            'delivery_method' => ['required', 'in:antar,ambil_sendiri'],
            'delivery_schedule' => ['nullable', 'date'],
        ]);

        $order = DB::transaction(function () use ($cart, $data) {
            $total = 0;

            foreach ($cart as $item) {
                $product = Product::lockForUpdate()->findOrFail($item['product_id']);
                abort_if($product->stock < $item['quantity'], 422, 'Stok ' . $product->name . ' tidak cukup.');
                $total += $product->effective_price * $item['quantity'];
            }

            $order = Order::create($data + [
                'order_number' => 'SYR-' . now()->format('YmdHis'),
                'status' => 'baru',
                'total_price' => $total,
            ]);

            foreach ($cart as $item) {
                $product = Product::lockForUpdate()->findOrFail($item['product_id']);
                $quantity = (int) $item['quantity'];

                $order->items()->create([
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'unit' => $product->unit,
                    'price' => $product->effective_price,
                    'quantity' => $quantity,
                    'subtotal' => $product->effective_price * $quantity,
                ]);

                $product->decrement('stock', $quantity);
            }

            return $order;
        });

        session()->forget('cart');
        session()->push('recent_orders', $order->id);

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order): View
    {
        return view('checkout.success', compact('order'));
    }

    public function uploadPaymentProof(Request $request, Order $order): RedirectResponse
    {
        $data = $request->validate([
            'payment_proof' => ['required', 'image', 'max:2048'],
        ]);

        $order->update([
            'payment_proof' => $data['payment_proof']->store('payment-proofs', 'public'),
        ]);

        return back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    private function cartItems(): array
    {
        return collect(session('cart', []))
            ->map(function ($item) {
                $item['subtotal'] = $item['price'] * $item['quantity'];

                return $item;
            })
            ->values()
            ->all();
    }

    private function cartTotal(): int
    {
        return collect($this->cartItems())->sum('subtotal');
    }
}
