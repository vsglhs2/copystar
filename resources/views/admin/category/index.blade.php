@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>    
            @foreach ($categories as $category)
                <tr style="vertical-align: middle">
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$category->title}}</td>
                    <td>
                        <form action="{{route('admin.category.destroy', $category->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <form action="{{route('admin.category.store')}}" method="post">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Type category name" name="title">
            <button class="btn btn-outline-primary" type="submit">Create</button>
        </div>

      </form>
</div>
@endsection
