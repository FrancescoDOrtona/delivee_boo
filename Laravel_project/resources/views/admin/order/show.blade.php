@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Informazione Utente</h3>
        <ul class="card p-3">
            <li>Nome : {{ $order->customer_name }}</li>
            <li>Cognome : {{ $order->customer_last_name }}</li>
            <li>Email : {{ $order->customer_email }}</li>
            <li>Numero di Cellulare : {{ $order->customer_phone }}</li>
            <li>Indirizzo : {{ $order->customer_address }}</li>
        </ul>
        <h3>Dati ordine</h3>
        <ul class="card p-3">
            <li>Prezzo Totale Ordine : {{ $order->total_price }} €</li>
            <li>Stato ordine : {{ $order->payment_status ? 'Success' : 'Failed' }}</li> 
            <li>Data emissione ordine : {{ $order->created_at}}</li>
        </ul>
        <h3>Prodotti Acquistati</h3>
        @foreach( $order->products as $product )
            <ul class="card p-3">
                <li>Nome : {{ $product->name }}</li>
                <li>Prezzo : {{ $product->price }} €</li>
                <li>Quantità : {{ $product->pivot->quantity }}</li>
            </ul>
        @endforeach
    </div>
@endsection