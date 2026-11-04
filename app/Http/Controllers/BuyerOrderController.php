<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BuyerOrderController extends Controller
{
    public function index(Request $request): View
    {
        $orders = collect();

        if ($request->filled('whatsapp')) {
            $orders = Order::where('customer_whatsapp', $request->whatsapp)
                ->latest()
                ->get();
        } else {
            $recentOrderIds = array_unique(session('recent_orders', []));
            $orders = Order::whereIn('id', $recentOrderIds)
                ->latest()
                ->get();
        }

        return view('buyer.orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('buyer.orders.show', [
            'order' => $order->load('items'),
            'statuses' => ['baru', 'diproses', 'dikirim', 'selesai'],
        ]);
    }
}
