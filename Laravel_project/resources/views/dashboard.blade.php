@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div>
                        @if (!isset($restaurant['id']))
                        <a href="{{route('admin.restaurant.create')}}">Aggiungi le informazioni del tuo ristorante</a>
                        @else
                            <h2>{{ $restaurant['restaurant_name'] }}</h2>
                            <p>{{ $restaurant['restaurant_description'] }}</p>
                            <p>{{ $restaurant['restaurant_address'] }}</p>
                            <p>{{ $restaurant['phone_number'] }}</p>
                            @if($restaurant['restaurant_image'])
                            <img class="img-fluid" src="{{ asset('storage/' . $restaurant['restaurant_image']) }}" alt="">
                            @endif
                        @endif
                        

                        
                        {{-- <a href="{{route('admin.restaurant.show' , $restaurant['id'])}}">Ristorante</a>   --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
