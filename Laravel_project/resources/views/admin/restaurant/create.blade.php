@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>sono la create restaurant</h1>
            
                
                <form action="" method="POST">

                    @csrf
                    <div class="mb-4 row">
                        <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Name') }}</label>

                        <div class="col-md-6">
                            <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name" autofocus>

                            @error('restaurant_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        @foreach ($types as $type)
                            <label for="type-{{$type->id}}" class="col-md-4 col-form-label text-md-right">{{ __($type->name) }}</label>
                            <input type="checkbox" name="types[]" id="type-{{$type->id}}" value="{{$type->id}}" @checked(in_array($type->id, old('types', [])))>
                        @endforeach

                        @error('types[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 row">
                        <label for="restaurant_address" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant address') }}</label>

                        <div class="col-md-6">
                            <input id="restaurant_address" type="text" class="form-control @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{ old('restaurant_address') }}" required autocomplete="restaurant_address">

                            @error('restaurant_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                        <div class="col-md-6">
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Vat Number') }}</label>

                        <div class="col-md-6">
                            <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number">

                            @error('vat_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="restaurant_image" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Image') }}</label>

                        <div class="col-md-6">
                            <input id="restaurant_image" type="file" class="form-control @error('restaurant_image') is-invalid @enderror" name="restaurant_image" value="{{ old('restaurant_image') }}" >

                            @error('restaurant_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <label for="restaurant_description" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Description') }}</label>

                        <div class="col-md-6">
                            <textarea id="restaurant_description" type="file" class="form-control @error('restaurant_description') is-invalid @enderror" 
                            name="restaurant_description" value="{{ old('restaurant_description') }}" rows="10" cols="10">
                            </textarea>
                            @error('restaurant_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">
                            Crea
                        </button>
                    </div>

                    
                </form>
        </div>
    </div>
@endsection

