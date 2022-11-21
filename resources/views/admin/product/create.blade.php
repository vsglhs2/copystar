@extends('layouts.admin')

@section('content')
<div class="container">
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="form-label">Title</label>
        <input type="text" class="form-control mb-3" placeholder="Title" name="title" value="{{old('title')}}">
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Image</label>
        <input type="file" accept=".png, .jpg, .jpeg" class="form-control mb-3" name="image" value="{{old('image')}}">
        @error('image')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Cost</label>
        <input type="text" class="form-control mb-3" placeholder="Cost" name="cost" value="{{old('cost')}}">
        @error('cost')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Model</label>
        <input type="text" class="form-control mb-3" placeholder="Model" name="model" value="{{old('model')}}">
        @error('model')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Production country</label>
        <input type="text" class="form-control mb-3" placeholder="Production country" name="production_country" value="{{old('production_country')}}">
        @error('production_country')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Production year</label>
        <input type="text" class="form-control mb-3" placeholder="Production year" name="production_year" value="{{old('production_year')}}">
        @error('production_year')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select mb-3">
            <option value="">None</option>
            @foreach ($categories as $category)
                <option {{ old('category_id' === $category->id) ? "selected" : "" }} value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <label class="form-label">Amount</label>
        <input type="text" class="form-control mb-3" placeholder="Amount" name="amount" value="{{old('amount')}}">
        @error('amount')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
