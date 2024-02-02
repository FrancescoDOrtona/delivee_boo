@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="fs-3 text-dark my-4 py-3 border-bottom border-dark">
        Restaurant Dashboard
    </h1>
    <div class="row justify-content-around">
        <div class="col-4 p-5">
            <h2 class="fs-1">{{ Auth::user()->name }} </h2>
            <p class="text-secondary">{{ Auth::user()->email }}</p>
        </div>
        <div class="col-8 py-5">
            @if (!isset($restaurant['id']))
                <a href="{{route('admin.restaurant.create')}}">Add your restaurant information</a>
            @else

            <h2>Restaurant Infomation</h2>
            <p class="text-secondary fw-semibold"> Manage your restaurant information</p>
            <div class="row">
                <div class="col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Name</h5>
                      <p class="card-text">{{ $restaurant['restaurant_name'] }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Description</h5>
                      <p class="card-text">{{ $restaurant['restaurant_description'] }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Address</h5>
                        <p class="card-text">{{ $restaurant['restaurant_address'] }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Phone Number</h5>
                        <p class="card-text">{{ $restaurant['phone_number'] }}</p>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Restaurant Image</h5>

                        @if($restaurant['restaurant_image'])
                            <img class="img-fluid" src="{{ asset('storage/' . $restaurant['restaurant_image']) }}" alt="">
                        @endif

                        {{-- <a href="{{route('admin.restaurant.show' , $restaurant['id'])}}">Ristorante</a>   --}}

                      </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

</div>
@endsection
