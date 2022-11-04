<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $order = Order::where('user_id', auth()->user()->id)->where('status', 'fill')->first();
        if (!$order) return view('basket.blank');
        $orderId = $order->id;
        $orderProducts = OrderProducts::where('order_id', $order->id)->get();

        foreach ($orderProducts as $current) {
            $product = Product::find($current->product_id);
            $current->title = $product->title;
            $current->cost = $product->cost;
        } 
        return view('basket.index', compact('orderProducts', 'orderId'));
    }
}
