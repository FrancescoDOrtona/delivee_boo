@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
    
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


    </div>
</div>


@endsection