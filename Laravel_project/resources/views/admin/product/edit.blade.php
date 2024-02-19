@extends('layouts.app')

@section('content')
    {{-- <h1>Products Create</h1> --}}

    <div class="container">
        <div class="row mt-3 mb-3">
            <h1>Product Information</h1>

            <form action="{{ route('admin.product.update', $product) }}" method="POST" enctype="multipart/form-data">

                @method('PUT')
                @csrf

                <div class="mb-4 row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name', $product->name) }}" required autocomplete="name" autofocus
                            oninput="inputValidation('name')" onblur="inputValidation('name')">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- Error message from validation --}}
                        <div class="mb-1 mt-2 row">
                            <div id="nameConfirmMessage" class="confirm-message col-md-6"></div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text">€</span>
                            <input id="price" type="number" step="0.01" min="0"
                                class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price', $product->price) }}" required autocomplete="price" autofocus
                                oninput="inputValidation('price')" onblur="inputValidation('price')">


                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        {{-- Error message from validation --}}
                        <div class="mb-1 mt-2 row">
                            <div id="priceConfirmMessage" class="confirm-message col-md-6"></div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                            name="image" value="{{ old('image', $product->image) }}">

                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <textarea id="description" type="file" class="form-control @error('description') is-invalid @enderror"
                            name="description" rows="10" oninput="inputValidation('description')" onblur="inputValidation('description')">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- Error message from validation --}}
                        <div class="mb-1 mt-2 row">
                            <div id="descriptionConfirmMessage" class="confirm-message col-md-6"></div>
                        </div>
                    </div>
                </div>

                <div class="form-check form-switch">
                    <input class="form-check-input" name="available" type="checkbox" role="switch" id="available"
                        value="1" @checked($product->available)>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Available</label>
                </div>

                <div>
                    <button class="btn btn-primary" type="submit" id="submit">
                        Edit
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection

<script>
    // Input validation
    function inputValidation(inputName) {
        // get the input values
        let input = document.getElementById(`${inputName}`);
        let inputValue = input.value;

        // reformat the message input name
        let formattedName = inputName.includes('_') ?
            inputName.split('_').map((word, index) => index === 0 ? word.charAt(0).toUpperCase() + word.slice(1) :
                word)
            .join(' ') :

            inputName[0].toUpperCase() + inputName.slice(1);

        // only allows for number for a given name input
        if (inputName === 'price') {
            inputValue = input.value.replace(/\D/g, '');
        }

        if (!inputValue) {
            // display an error message
            document.getElementById(`${inputName}ConfirmMessage`).innerHTML = `Please input the ${formattedName}!`;
            // add a class to style the error
            document.getElementById(`${inputName}`).classList.add('confirm-error');
            // disable submit button
            document.getElementById("submit").disabled = true;
        } else {
            // display an error message
            document.getElementById(`${inputName}ConfirmMessage`).innerHTML = '';
            // add a class to style the error
            document.getElementById(`${inputName}`).classList.remove('confirm-error');
            // disable submit button
            document.getElementById("submit").disabled = false;
        }
    }
</script>
