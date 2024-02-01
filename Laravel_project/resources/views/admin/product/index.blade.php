@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="title">
            <h1>Restaurant Menu</h1>
        </div>

        <div class="products row gap-3">
            @foreach ($products as $product)
            <div class="card col-3" style="width: 18rem;">
                <img src="{{ $product->image}}" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column gap-3">
                  <h5 class="card-title">{{ $product->name}}</h5>
                  <p class="card-text">{{ $product->description }}</p>
                  <small>{{ $product->price }} €</small>
                  <p>Available: 
                    @if ($product->available == true)
                      &check;
                    @else
                      &cross;
                    @endif
                    </p>
                  <a href="#" class="btn btn-primary">Product Details</a>
                </div>
              </div>
            @endforeach
            
        </div>
        <div class="m-3">
            <a class="btn btn-primary" href="{{route('admin.product.create')}}">Crea il piatto</a>
        </div>

    </div>


@endsection