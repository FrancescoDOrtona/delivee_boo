@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">Order Code</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="table-row">
                    <td class="text-uppercase">{{ $order->order_code }}</td>
                    <td>{{ $order->total_price }} €</td>
                    <td>{{ $order->payment_status ? 'Success' : 'Failed' }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_last_name }}</td>
                    <td>{{ $order->customer_email }}</td>
                    <td>{{ $order->customer_address }}</td>
                    <td>{{ $order->customer_phone }}</td>
                </tr>                    
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>


@endsection