<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Category $category) {
        $products = Product::where('category_id', $category->id)->get();
        
        foreach ($products as $product) {
            $product->update(['category_id' => null]);
        }
        $category->delete();
        
        return redirect()->route('admin.category.index');
    }
}
