<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        
        $imageName = time().'.'.$data['image']->extension();
        $path = $data['image']->storeAs('public/images', $imageName);

        $data['imageUrl'] = Storage::url($path);
        unset($data['image']);
        
        Product::create($data);
        
        return redirect()->route('admin.product.index');
    }
}
