<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product) {
        $data = $request->validated();

        if (isset($data['image'])) {
            Storage::delete($product->imageUrl);
            $imageName = time().'.'.$data['image']->extension();
            $path = $data['image']->storeAs('public/images', $imageName);
            unset($data['image']);
            $data['imageUrl'] = Storage::url($path);
        }

        $product->update($data);

        return redirect()->route('admin.product.index');
    }
}
