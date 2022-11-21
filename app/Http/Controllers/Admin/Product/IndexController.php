<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $products = Product::where('amount', '>', 0)->orderBy('created_at', 'DESC')->paginate(8);

        return view('admin.product.index', compact('products'));
    }
}
