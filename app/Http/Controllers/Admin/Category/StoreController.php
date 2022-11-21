<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        $category = Category::create(['title' => $data['title']]);

        return redirect()->route('admin.category.index');
    }
}
