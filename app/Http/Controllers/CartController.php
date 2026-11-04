<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        return view('cart.index', [
            'cartItems' => $this->cartItems(),
            'total' => $this->cartTotal(),
        ]);
    }

    public function store(Request $request, Product $product): RedirectResponse
    {
        abort_unless($product->is_active && $product->stock > 0, 404);

        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $product->stock],
        ]);

        $cart = session('cart', []);
        $currentQuantity = $cart[$product->id]['quantity'] ?? 0;
        $newQuantity = min($currentQuantity + $data['quantity'], $product->stock);

        $cart[$product->id] = [
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->effective_price,
            'unit' => $product->unit,
            'quantity' => $newQuantity,
            'photo' => $product->photo,
        ];

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Produk masuk keranjang.');
    }

    public function update(Request $request, Product $product): RedirectResponse|JsonResponse
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $product->stock],
        ]);

        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $data['quantity'];
            session(['cart' => $cart]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Keranjang diperbarui.',
                'total' => $this->cartTotal(),
            ]);
        }

        return back()->with('success', 'Keranjang diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $cart = session('cart', []);
        unset($cart[$product->id]);
        session(['cart' => $cart]);

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }

    private function cartItems(): array
    {
        $products = Product::whereIn('id', array_keys(session('cart', [])))
            ->get()
            ->keyBy('id');

        return collect(session('cart', []))
            ->map(function ($item) use ($products) {
                $item['max_stock'] = $products->get($item['product_id'])?->stock ?? $item['quantity'];
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
