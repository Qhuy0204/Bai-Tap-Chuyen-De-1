<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn
    public function index()
    {
        $orders = Order::with('items')->get();
        return view('orders.index', compact('orders'));
    }

    // Tạo đơn hàng
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'products' => 'required|array'
        ]);

        // ❌ Không cho đơn rỗng
        if (count($request->products) == 0) {
            return back()->with('error', 'Đơn hàng rỗng');
        }

        // Tạo order
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'status' => 'pending',
            'total' => 0
        ]);

        $total = 0;

        // Lưu từng sản phẩm
        foreach ($request->products as $p) {

            if (!empty($p['name']) && !empty($p['price']) && !empty($p['quantity'])) {

                $subtotal = $p['price'] * $p['quantity'];
                $total += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_name' => $p['name'],
                    'price' => $p['price'],
                    'quantity' => $p['quantity']
                ]);
            }
        }

        // Cập nhật tổng tiền
        $order->update(['total' => $total]);

        return redirect()->back()->with('success', 'Tạo đơn thành công');
    }

    // Xem chi tiết
    public function show($id)
    {
        $order = Order::with('items')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Cập nhật trạng thái
    public function updateStatus($id, $status)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => $status
        ]);

        return back()->with('success', 'Đã cập nhật trạng thái');
    }
}