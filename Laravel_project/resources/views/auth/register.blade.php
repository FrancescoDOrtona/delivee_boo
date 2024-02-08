@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" oninput="mailValidation()">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-2 mt-1 row">
                                <div id="emailConfirmMessage" class="confirm-message col-md-6"></div>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" oninput="ConfirmPasswordMatch()">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" oninput="ConfirmPasswordMatch()"> 
                            </div>
                            
                        </div>
                        <div class="mb-1 row">
                             <div id="confirmMessage" class="confirm-message col-md-6"></div>
                        </div>
                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id='submit' class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<script> 
// Password and confirm password validation
function ConfirmPasswordMatch() {
    // get the password and confirm password values
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('password-confirm').value;
    
    // if values doesn't match
    if (password !== confirmPassword) {
        // display an error message
        document.getElementById('confirmMessage').innerHTML = 'Password do not match!';
        // add a class to style the error
        document.getElementById('password-confirm').classList.add('confirm-error');
        // disable submit button
        document.getElementById("submit").disabled = true;
        
    } else {
        // no error message
        document.getElementById('confirmMessage').innerHTML = '';
        // error class removed
        document.getElementById('password-confirm').classList.remove('confirm-error');
        // submit button is now working
        document.getElementById("submit").disabled = false;
    }
}

// Email validation
function mailValidation() {
// get the email input value
const emailInput = document.getElementById('email').value;
// validate email format using regular expression
const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailInput)) {
    // Display error message
    document.getElementById('emailConfirmMessage').innerHTML = 'Please enter a valid email address!';
    // add a class to style the error
    document.getElementById('email').classList.add('confirm-error');
    // disable submit button
    document.getElementById("submit").disabled = true;

    } else {
        // no error message
        document.getElementById('emailConfirmMessage').innerHTML = '';
        // error class removed
        document.getElementById('email').classList.remove('confirm-error');
        // submit button is now working
        document.getElementById("submit").disabled = false;
    }
}
</script>

