<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\DestroyRequest;
use App\Http\Resources\ErrorResource;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestroyController extends Controller
{
    public function __invoke(DestroyRequest $request) {
        $data = $request->validated();
        $order = Order::find($data['id']);
        $this->authorize('delete', $order);

        try {
            DB::beginTransaction();

            $order = Order::find($data['id']);
            $orderProducts = OrderProducts::where('order_id', $order->id)->get();

            foreach ($orderProducts as $current) {
                $product = Product::find($current->product_id);
                $product->update(['amount' => $product->amount + $current->amount]);
                $current->delete();
            }
            
            $order->delete();

            DB::commit();
            return new DestroyRequest();
        } catch (Exception $exception) {
            DB::rollBack();
            return new ErrorResource($exception);
        }
    }
}
