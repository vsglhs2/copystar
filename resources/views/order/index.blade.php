@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Number</th>
            <th scope="col">Status</th>
            <th scope="col">Show</th>
          </tr>
        </thead>
        <tbody>    
            @foreach ($orders as $order)
                <tr style="vertical-align: middle">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$order->id}}</td>
                    <td>{{$order->status}}</td>
                    <td><button type="button" onclick="location.replace('{{route('order.show', $order->id)}}')" class="btn btn-primary">Show</button></td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
