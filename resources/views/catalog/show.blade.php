@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="card">
        <div class="row g-0">

            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title">{{ $product->title }}</h2>
                    <p class="card-text"><span class="me-2">Cost:</span>{{ $product->cost }}</p>
                </div>    
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="me-2">Production year:</span>{{$product->production_year}}</li>
                    <li class="list-group-item"><span class="me-2">Production country:</span>{{$product->production_country}}</li>
                    <li class="list-group-item"><span class="me-2">Model:</span>{{$product->model}}</li>
                    <li class="list-group-item"><span class="me-2">Amount:</span>{{$product->amount}}</li>
                </ul>    
                <div class="card-body">
                    <a href="{{route('catalog.index')}}" class="btn btn-primary me-2">Back</a>
                    <a href="#" class="btn btn-primary">Add to basket</a>
                </div>                
            </div>
            <div class="col-md-6">
                <img src="{{$product->imageUrl}}" alt="" class="img-fluid rounded-end">
            </div>            
        </div>

    </div>

</div>
@endsection
