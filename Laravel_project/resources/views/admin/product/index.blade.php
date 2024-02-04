@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center gap-5">
            <div class="title d-flex align-items-center justify-content-between">
                <h1>Restaurant Menu</h1>
                <div class="m-3">
                    <a class="btn btn-primary" href="{{route('admin.product.create')}}">Add Dish</a>
                </div>
            </div>
            <div class="products">
                @foreach ($products as $product)
                <div class="card p-3">
                    {{-- container img --}}
                    <div class="card-img ">
                        <img src="{{ asset('storage/' . $product->image )}}" class="rounded w-100 img-fluid" alt="...">
                    </div>
                    {{-- container text --}}
                    <div class="card-body d-flex flex-column gap-1 flex-grow-1">
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
                    </div>
                    {{-- buttons --}}
                    <div class="d-flex flex-column gap-2">
                        <a href="{{route('admin.product.show',$product)}}" class="btn btn-primary">Product Details</a>
                        <a href="{{route('admin.product.edit', $product)}}" class="btn btn-secondary">Edit Product</a>
                    
                        <form class="margin-left-auto" action="{{route('admin.product.destroy',$product)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100">Delete</button>
                        </form>
                    </div>
                    {{-- <h1>Register your restaurant</h1>
                    <a class="btn btn-primary" href="{{route('admin.restaurant.create')}}"></a> --}}
                </div>
                @endforeach
            </div>
            
        </div>
    </div>



@endsection