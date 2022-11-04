@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Number</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>    
            @foreach ($orders as $order)
                <tr style="vertical-align: middle">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><a href="{{ route('order.show', $order->id) }}">{{$order->id}}</a></td>
                    <td>{{$order->status}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
