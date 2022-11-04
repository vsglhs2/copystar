<?php

namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Basket\UpdateRequest;
use App\Http\Resources\Basket\Resource;
use App\Http\Resources\ErrorResource;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request) {
        $data = $request->validated();
        $amount = 0;
        if (isset($data['amount'])) $amount = $data['amount'];
        
        $order = Order::where('user_id', auth()->user()->id)->where('status', 'fill')->first();
        $product = Product::find($data['id']);
        $orderProduct = null;

        try {
            DB::beginTransaction();

            if (!$order) {
                $order = Order::create([
                    'user_id' => auth()->user()->id,
                    'status' => 'fill'
                ]);
            }

            $orderProduct = OrderProducts::where('order_id', $order->id)->where('product_id', $product->id)->first();
            $orderProductSub = ($orderProduct->amount ?? 0) + $amount;
            $currentAmount = $product->amount - $orderProductSub;

            if ($currentAmount >= 0 && $orderProductSub > 0) {
                if (!$orderProduct) {
                    $orderProduct = OrderProducts::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'amount' => $amount
                    ]);
                } else {
                    $orderProduct->update([
                        'amount' => $orderProduct->amount + $amount
                    ]);
                }
            } else {
                throw new Exception('Not enough amount');
            } 
            
            DB::commit();

            return new Resource($orderProduct);
        } catch (Exception $exception) {
            DB::rollBack();
            return new ErrorResource($exception);
        }


        
    }
}
