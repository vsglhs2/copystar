<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\DenyRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\Order\StatusResource;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DenyController extends Controller
{
    public function __invoke(DenyRequest $request) {
        try {
            $data = $request->validated();
            $order = Order::find($data['order']);
            $cause = $data['cause'];
            
            if ($order->status != 'new') throw new Exception('Can\'t update status of order, which status is not new');

            DB::beginTransaction();

            $orderProducts = OrderProducts::where('order_id', $order->id)->get();

            foreach ($orderProducts as $current) {
                $product = Product::find($current->product_id);
                $product->update(['amount' => $product->amount + $current->amount]);
            }

            $order->updateOrFail([
                'status' => 'denied',
                'cause' => $cause
            ]);

            DB::commit();
            return new StatusResource($order);            
        } catch (Exception $exception) {
            DB::rollBack();
            return new ErrorResource($exception);
        }
        
    }
}
