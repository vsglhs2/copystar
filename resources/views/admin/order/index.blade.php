@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">TimeStamp</th>
            <th scope="col">Email</th>
            <th scope="col">TotalCount</th>
            <th scope="col">Status</th>
            <th scope="col">Show</th>
            <th scope="col">ChangeStatus</th>
          </tr>
        </thead>
        <tbody>    
            @foreach ($orders as $order)
                <tr style="vertical-align: middle">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->totalCount}}</td>
                    <td>{{$order->status}}</td>
                    <td><button type="button" onclick="location.replace('{{route('order.show', $order->id)}}')" class="btn btn-primary">Show</button></td>
                    <td>
                    @if ($order->status == 'new')
                        @include('includes.order.accept', ['order' => $order->id, 'text' => 'Accept']) @include('includes.order.deny', ['order' => $order->id, 'text' => 'Deny'])
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
