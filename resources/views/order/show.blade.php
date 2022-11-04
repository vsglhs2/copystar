@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <h2 class="title col-9">Order {{$order->id}}:</h2>
        <div class="col-auto">
            @can('delete', $order)
                @include('includes.order.destroy')
            @endcan            
            <span class="title ms-2">Status: {{$order->status}}</span>
        </div>

    </div>

    @include('includes.order.show', ['orderProducts' => $orderProducts])
</div>
@endsection
