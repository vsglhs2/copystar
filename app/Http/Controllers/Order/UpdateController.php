<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\UpdateRequest;
use Illuminate\Http\Request;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\Order\UpdateResource;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request) {
        $data = $request->validated();
        $order = Order::find($data['id']);
        $this->authorize('update', $order);

        try {
            DB::beginTransaction();

            $order = Order::find($data['id']);

            $orderProducts = OrderProducts::where('order_id', $order->id)->get();

            foreach ($orderProducts as $product) {
                $current = Product::find($product->product_id);

                if ($current->amount < $product->amount) throw new Exception('Not enough amount');
                
                $current->update(['amount' => $current->amount - $product->amount]);
            }

            $order->update(['status' => $data['status']]);

            DB::commit();
            return new UpdateResource($data);
        } catch (Exception $exception) {
            DB::rollBack();
            return new ErrorResource($exception);
        }
    }
}
