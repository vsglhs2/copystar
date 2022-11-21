<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestroyController extends Controller
{
    public function __invoke(Product $product) {
        Storage::delete($product->imageUrl);
        $product->delete();

        return back();
    }
}
