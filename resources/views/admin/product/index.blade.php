@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary mb-3">Create product</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Show</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>    
            @foreach ($products as $product)
                <tr style="vertical-align: middle">
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->title}}</td>
                    <td><a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-primary">Show</a></td>
                    <td><a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('admin.product.destroy', ['product' => $product->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $products->links() }}
</div>
@endsection
