<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Filters\CatalogFilter;
use App\Http\Requests\Catalog\IndexRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request) {
        $data = $request->validated();
        $filter = new CatalogFilter($data);

        $products = Product::filter($filter)->orderBy('created_at', 'DESC')->where('amount', '>', 0)->paginate(8);
        $categories = Category::all();

        return view('catalog.index', compact('products', 'categories', 'data'));
    }
}
