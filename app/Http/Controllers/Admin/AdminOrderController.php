<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $statuses = OrderStatus::all();
        $orders = Order::query()->paginate(10);

        return view('admin.orders.adminOrders', compact('orders', 'statuses'));
    }

    public function new()
    {
        $statuses = OrderStatus::all();
        $orders = Order::query()->where('order_status_id', '1')->paginate(10);

        return view('admin.orders.adminNewOrders', compact('orders', 'statuses'));
    }

    public function updateStatus(Request $request, Order $order)
    {

        $request->validate([
            'status' => 'required|exists:order_statuses,id',
        ]);

        $order->order_status_id = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Статус заказа обновлён.');
    }
}
