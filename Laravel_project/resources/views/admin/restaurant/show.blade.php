@extends('layouts.app')

@section('content')
    <ul>
        <li>{{$restaurant->restaurant_name}}</li>
        <li>{{$restaurant->restaurant_description}}</li>
        <li>{{$restaurant->restaurant_address}}</li>
        <li>{{$restaurant->phone_number}}</li>
    </ul>
@endsection