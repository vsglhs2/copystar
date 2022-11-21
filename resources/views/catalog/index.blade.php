@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title mb-3">Catalog</h1>
        <form class="row justify-content-between align-items-center mb-3" action="{{ route('catalog.index') }}" method="GET">
                <label class="form-label">Category:</label>
                <select class="form-select col-2 me-2 mb-2" name="category">
                    <option value="">None</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($data['category']) && $data['category'] == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>

                <label class="form-label">Year order:</label>
                <select class="form-select col-2 me-2 mb-3" name="order">
                    <option value="">None</option>
                    <option value="year-up" {{ isset($data['order']) && $data['order'] == 'year-up' ? 'selected' : '' }}>
                        Year up order</option>
                    <option value="year-down" {{ isset($data['order']) && $data['order'] == 'year-down' ? 'selected' : '' }}>
                        Year down order</option>
                    <option value="title-up" {{ isset($data['order']) && $data['order'] == 'title-up' ? 'selected' : '' }}>
                        Title up order</option>
                    <option value="title-down" {{ isset($data['order']) && $data['order'] == 'title-down' ? 'selected' : '' }}>
                        Title down order</option>
                    <option value="cost-up" {{ isset($data['order']) && $data['order'] == 'cost-up' ? 'selected' : '' }}>
                        Cost up order</option>
                    <option value="cost-down" {{ isset($data['order']) && $data['order'] == 'cost-down' ? 'selected' : '' }}>
                        Cost down order</option>
                </select>

                <div class="col-10">
                    <button type="submit" class="btn btn-primary me-2">Filter</button>
                    <a href="{{ route('catalog.index') }}" class="btn btn-primary">Reset</a>                    
                </div>

        </form>
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-3">
            @foreach ($products as $product)
            <div class="col">
                <div class='card h-100'>
                    <a href="{{ route('catalog.show', $product->id) }}">
                        <img src="{{ $product->imageUrl }}" alt="" class="card-img-top" style="height: 25vh; object-fit: cover">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h2 class="card-title">{{ $product->title }}</h2>
                        <p class="card-text"><span class="me-2">Production year:</span>{{ $product->cost }}</p>
                        @can('isUser', auth()->user())
                            @include('includes.basket.add', ['product' => $product->id, 'amount' => 1, 'text' => 'Add to basket'])
                        @endcan
                    </div>
                </div>                
            </div>

            @endforeach
        </div>
        <div>
            {{ $products->withQueryString()->links() }}
        </div>

    </div>
@endsection
