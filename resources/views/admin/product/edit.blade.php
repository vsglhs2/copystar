@extends('layouts.admin')

@section('content')
<div class="container">
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <label class="form-label">Title</label>
        <input type="text" class="form-control mb-3" placeholder="Title" name="title" value="{{$product->title}}">
        @error('title')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Image</label>
        <div class="mb-3">
            <img src="{{$product->imageUrl}}" alt="" class="img-fluid" id="productImage">
        </div>
        <input type="file" accept=".png, .jpg, .jpeg" class="form-control mb-3" name="image" onchange="onChange(event)">
        <script>
            function onChange(event) {
                const imageObj = document.querySelector('#productImage');
                const file = event.target.files[0];
                if (file) {
                    const url = URL.createObjectURL(file);
                    imageObj.src = url;
                }
            }

        </script>
        @error('image')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Cost</label>
        <input type="text" class="form-control mb-3" placeholder="Cost" name="cost" value="{{$product->cost}}">
        @error('cost')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Model</label>
        <input type="text" class="form-control mb-3" placeholder="Model" name="model" value="{{$product->model}}">
        @error('model')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Production country</label>
        <input type="text" class="form-control mb-3" placeholder="Production country" name="production_country" value="{{$product->production_country}}">
        @error('production_country')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <label class="form-label">Production year</label>
        <input type="text" class="form-control mb-3" placeholder="Production year" name="production_year" value="{{$product->production_year}}">
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
        <input type="text" class="form-control mb-3" placeholder="Amount" name="amount" value="{{$product->amount}}">
        @error('amount')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Go back</a>
    </form>
</div>
@endsection
