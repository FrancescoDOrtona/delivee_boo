@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        oninput="mailValidation()" onblur="mailValidation()">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class=" mt-2 row">
                                        <div id="emailConfirmMessage" class="confirm-message col-md-6"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" onblur="passwordValidation()">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="mb-1 mt-2 row">
                                        <div id="passwordConfirmMessage" class="confirm-message col-md-6"></div>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" id="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
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

    // Password validation
    function passwordValidation() {
        // get the name values
        let password = document.getElementById('password');
        let passwordInput = document.getElementById('password').value

        if (!passwordInput) {
            // display an error message
            document.getElementById('passwordConfirmMessage').innerHTML = 'Please enter a password!';
            // add a class to style the error
            document.getElementById('password').classList.add('confirm-error');
            // disable submit button
            document.getElementById("submit").disabled = true;
        } else {
            // display an error message
            document.getElementById('passwordConfirmMessage').innerHTML = '';
            // add a class to style the error
            document.getElementById('password').classList.remove('confirm-error');
            // disable submit button
            document.getElementById("submit").disabled = false;
        }
    }
</script>
