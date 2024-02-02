@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-6">
            <img class="img-fluid w-100 rounded" src="{{asset('storage/'.$product->image)}}" alt="">
        </div>
        <div class="col-6">
            <h2>{{ $product->name }}</h2>
            <ul>
                <li>{{ $product->price }} € </li>
                @if($product->available == false)
                <li>Non disponibile</li>
                @else
                <li>Disponibile</li>
                @endif

                <li>{{$product->description}}</li>
            </ul>
            <div class="d-flex align-items-start gap-3 ">
                <a href="{{route('admin.product.edit', $product)}}" class="btn btn-secondary">Edit Product</a>
                <form class="margin-left-auto" action="{{route('admin.product.destroy',$product)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        
    </div>
</div>


@endsection