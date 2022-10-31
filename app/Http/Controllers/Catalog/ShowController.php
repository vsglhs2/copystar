<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product) {
        return view('catalog.show', compact('product'));
    }
}
