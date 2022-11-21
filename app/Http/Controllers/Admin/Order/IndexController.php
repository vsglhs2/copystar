<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $orders = Order::where('status', '<>', 'fill')->get();
        foreach ($orders as $order) {
            $order->email = User::find($order->user_id)->email;
            $orderProducts = OrderProducts::where('order_id', $order->id)->get();
            $count = 0;
            foreach ($orderProducts as $orderProduct) {
                $count += $orderProduct->amount;
            }
            $order->totalCount = $count;
        }

        return view('admin.order.index', compact('orders'));
    }
}
