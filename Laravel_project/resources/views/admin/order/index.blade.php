@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="order-code" scope="col">Order Code</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Reception Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="table-row">
                            <td class="order-code" class="text-uppercase">{{ $order->order_code }}</td>
                            <td>{{ $order->total_price }} €</td>
                            <td>{{ $order->payment_status ? 'Success' : 'Failed' }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td><button class="btn btn-primary"><a
                                        href="{{ route('admin.order.show', $order) }}">Details</a></button></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="container">
                <div class="row">
                    <ul class="pagination d-flex justify-content-center gap-3">
                        @for ($i = 1; $i <= $totalPages; $i++)
                            @if ($i < $orders->lastPage())
                                <li class="page-item {{ $i == $orders->currentPage() ? 'active' : '' }}">
                                    <a class="page-link {{ $i == $orders->currentPage() ? 'current-page' : '' }}"
                                        href="{{ route('admin.order.index', ['page' => $i]) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
                </divc>
            </div>
        </div>
    @endsection
