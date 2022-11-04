<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $orders = Order::where('user_id', auth()->user()->id)->where('status', '<>', 'fill')->get();
        if (count($orders) == 0) return view('order.blank');

        return view('order.index', compact('orders'));
    }
}
