@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="fs-3 text-dark my-4 py-3 border-bottom border-dark">
        Dashboard
    </h1>
    <div class="row justify-content-around">
        <div class="col-md-4 p-md-5 text-center">
            <svg class="icon-profile" height="150px" width="150px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60.671 60.671" xml:space="preserve">
                <ellipse style="fill:#010002;" cx="30.336" cy="12.097" rx="11.997" ry="12.097"/>
                <path style="fill:#010002;" d="M35.64,30.079H25.031c-7.021,0-12.714,5.739-12.714,12.821v17.771h36.037V42.9 C48.354,35.818,42.661,30.079,35.64,30.079z"/>
            </svg>
            <h2 class="fs-1 fw-bold">{{ Auth::user()->name }} </h2>
            <p class="text-secondary ">{{ Auth::user()->email }}</p>
        </div>
        <div class="col-10 col-sm-12 col-md-8 py-3 py-md-5">
            @if (!isset($restaurant['id']))
                <a href="{{route('admin.restaurant.create')}}">Add your restaurant information</a>
            @else
            <div class="d-flex justify-content-between align-items-center">
              <h2 class="fs-4">Restaurant Infomation</h2>
              {{-- @dd($restaurant) --}}
              <a class="btn btn-primary" href="{{route('admin.restaurant.edit',$restaurant['id'])}}">Edit</a>
            </div>
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
