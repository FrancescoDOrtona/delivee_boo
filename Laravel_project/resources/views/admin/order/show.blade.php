@extends('layouts.app')

@section('content')
    <div class="container show-orders">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h3>Customer Info</h3>
                <ul class="card p-3">
                    <li><strong>Name : </strong>{{ $order->customer_name }}</li>
                    <li><strong>Last Name : </strong>{{ $order->customer_last_name }}</li>
                    <li><strong>Email : </strong>{{ $order->customer_email }}</li>
                    <li><strong>Phone Number : </strong>{{ $order->customer_phone }}</li>
                    <li><strong>Address : </strong>{{ $order->customer_address }}</li>
                </ul>
            </div>
            <div class="col-12 col-lg-6">
                <h3>Order Info</h3>
                <ul class="card p-3">
                    <li><strong> Total Price :</strong> {{ $order->total_price }} €</li>
                    <li><strong> Payment Status :</strong> {{ $order->payment_status ? 'Success' : 'Failed' }}</li> 
                    <li><strong> Reception date:</strong>{{ $order->created_at}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container show-orders">
        <div class="row">
            <h3>Ordered products</h3>
            @foreach( $order->products as $product )
            <div class="col-4">
                <ul class="card p-3">
                    <li><strong> Name :</strong> {{ $product->name }}</li>
                    <li><strong> Price :</strong> {{ $product->price }} €</li>
                    <li><strong> Quantity :</strong> {{ $product->pivot->quantity }}</li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
@endsection