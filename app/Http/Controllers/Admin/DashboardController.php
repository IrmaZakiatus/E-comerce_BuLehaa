<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'ordersToday' => Order::whereDate('created_at', today())->count(),
            'dailySales' => Order::whereDate('created_at', today())
                ->where('status', '!=', 'batal')
                ->sum('total_price'),
            'newOrders' => Order::where('status', 'baru')->count(),
            'lowStockProducts' => Product::where('stock', '<=', 5)->count(),
            'latestOrders' => Order::latest()->take(5)->get(),
        ]);
    }
}
