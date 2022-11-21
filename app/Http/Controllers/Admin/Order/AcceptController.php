<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\AcceptRequest;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\Order\StatusResource;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class AcceptController extends Controller
{
    public function __invoke(AcceptRequest $request) {
        $data = $request->validated();
        $order = Order::find($data['order']);

        try {
            if ($order->status != 'new') throw new Exception('Can\'t update status of order, which status is not new');
            $order->updateOrFail(['status' => 'accepted']);
            return new StatusResource($order);
        } catch (Exception $exception) {
            return new ErrorResource($exception);
        }
        
    }
}
