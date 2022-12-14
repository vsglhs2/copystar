<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Order $order) {
        $this->authorize('view', $order);

        $orderProducts = OrderProducts::where('order_id', $order->id)->get();
        $total = 0;

        foreach ($orderProducts as $current) {
            $product = Product::find($current->product_id);
            $current->title = $product->title;
            $current->cost = $product->cost;
            $current->total = $current->cost * $current->amount;
            $total += $current->total;
        } 

        return view('order.show', compact('order', 'orderProducts', 'total'));
    }
}
