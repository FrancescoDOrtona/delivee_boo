@extends('layouts.app');

@section('content')
    {{-- <h1>Products Create</h1> --}}

    <div class="container">
        <div class="row mt-3 mb-3">
            <h1>Product Information</h1>

            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" >

                @csrf

                <div class="mb-4 row">
                    <label for="name"
                        class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row" >
                    
                    <div class="col-md-6 input-group">
                        <label for="price"
                            class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
                            <input id="price" type="number" step="0.01" min="0"
                            class="form-control @error('price') is-invalid @enderror" name="price"
                            value="{{ old('price') }}" required autocomplete="price" autofocus>
                            <span class="input-group-text">€</span>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="image"
                        class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
        
                    <div class="col-md-6">
                        <input id="image" type="file"
                            class="form-control @error('image') is-invalid @enderror" name="image"
                            value="{{ old('image') }}">
        
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="mb-4 row">
                    <label for="description"
                        class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
        
                    <div class="col-md-6">
                        <textarea id="description" type="file"
                            class="form-control @error('description') is-invalid @enderror" name="description" rows="10">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" name="available" type="checkbox" role="switch" id="available" 
                    value="1" >
                    <label class="form-check-label" for="flexSwitchCheckChecked">Available</label>
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