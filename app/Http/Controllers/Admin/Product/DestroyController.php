<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke() {
        return view('admin.product.index');
    }
}
