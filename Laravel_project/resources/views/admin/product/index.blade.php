@extends('layouts.app')

@section('content')
    {{-- inizio modale  --}}
    <div class="modal" tabindex="-1" id="modalDelete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">are you sure to delete?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-modal">are you sure to delete : </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              <button type="button" id="button-modal-delete" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
      </div>
      {{-- fine modale  --}}

    <div class="container my-3">
        <div class="row justify-content-center gap-5">
            <div class="title d-flex align-items-center justify-content-between">
                <h1>Restaurant Menu</h1>
                <div class="">
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
                    
                        <form class="margin-left-auto form-delete" action="{{route('admin.product.destroy',$product)}}" method="POST" data-delete-name="{{$product->name}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100 form-delete-btn">Delete</button>
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