@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>sono la create restaurant</h1>
            <ul>
                @foreach ($types as $type)
                
                <li>{{$type->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

