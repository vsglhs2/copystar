@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <h2 class="title col-9">Basket</h2>
            <div class="col-auto">
                @include('includes.basket.confirm', ['order' => $orderId])
                @include('includes.order.destroy', ['order' => $orderId])
            </div>
        </div>
        
        @include('includes.basket.index', ['orderProducts' => $orderProducts])
    </div>
@endsection
