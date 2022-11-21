<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Cost</th>
        <th scope="col">Amount</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>    
        @foreach ($orderProducts as $orderProduct)
            <tr style="vertical-align: middle">
                <th scope="row">{{$loop->iteration}}</th>
                <td><a href="{{ route('catalog.show', $orderProduct->id) }}">{{$orderProduct->title}}</a></td>
                <td>{{$orderProduct->cost}}</td>
                <td>{{$orderProduct->amount}}</td>
                <td>{{$orderProduct->total}}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>{{$total}}</th>
      </tr>
    </tfoot>
  </table>