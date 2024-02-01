@extends('layouts.app')

@section('content')
    <div class="container">     
        <div class="title d-flex justify-content-between">
            <h1>Restaurant Menu</h1>
            <div class="m-3">
                <a class="btn btn-primary" href="{{route('admin.product.create')}}">Crea il piatto</a>
            </div>
        </div>

        <div class="products row gap-3">
            @foreach ($products as $product)
            <div class="card col-3" style="width: 18rem;">
                <img src="{{ asset('storage/' . $product->image )}}" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column gap-3">
                  <h5 class="card-title">{{ $product->name}}</h5>
                  <p class="card-text">{{ $product->description }}</p>
                  <small>{{ $product->price }} €</small>
                  <p>Available: 
                    @if ($product->available == true)
                      <span class="fw-bold text-success">&check;</span>
                    @else
                      <span class="fw-bold text-danger">&cross;</span>
                    @endif
                    </p>
                  <a href="#" class="btn btn-primary">Product Details</a>
                </div>
              </div>
            @endforeach
            
        </div>
       
        {{-- <h1>Register your restaurant</h1>
        <a class="btn btn-primary" href="{{route('admin.restaurant.create')}}"></a> --}}
     
    </div>


@endsection