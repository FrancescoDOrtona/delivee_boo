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
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        onblur="nameValidation()" oninput="nameValidation()">

                                    <div class="
                                        mt-2 row">
                                        <div id="nameConfirmMessage" class="confirm-message col-md-6"></div>
                                    </div>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" oninput="mailValidation()"
                                        onblur="mailValidation()">

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
                                        required autocomplete="new-password" oninput="passwordValidation()"
                                        onblur="passwordValidation(), passwordMatchValidation()">

                                    <div class="mb-1 mt-2 row">
                                        <div id="passwordConfirmMessage" class="confirm-message col-md-6"></div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-1 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        onfocus="passwordMatchValidation()" oninput="passwordMatchValidation()">

                                    <div class="mb-1 mt-2 row">
                                        <div id="passwordMatchConfirmMessage" class="confirm-message col-md-6"></div>
                                    </div>
                                </div>

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
    // Name validation
    function nameValidation() {
        // get the name values
        let name = document.getElementById('name');
        let nameInput = name.value

        if (!nameInput) {
            // display an error message
            document.getElementById('nameConfirmMessage').innerHTML = 'Please enter a name!';
            // add a class to style the error
            document.getElementById('name').classList.add('confirm-error');
            // disable submit button
            document.getElementById("submit").disabled = true;
        } else {
            // display an error message
            document.getElementById('nameConfirmMessage').innerHTML = '';
            // add a class to style the error
            document.getElementById('name').classList.remove('confirm-error');
            // disable submit button
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

    // Password and confirm password validation
    function passwordMatchValidation() {
        // get the password and confirm password values
        let passwordValue = document.getElementById('password').value;
        let confirmPasswordValue = document.getElementById('password-confirm').value;

        // if values doesn't match
        if (passwordValue !== confirmPasswordValue) {
            // display an error message
            document.getElementById('passwordMatchConfirmMessage').innerHTML = 'Password do not match!';
            // add a class to style the error
            document.getElementById('password-confirm').classList.add('confirm-error');
            // disable submit button
            document.getElementById("submit").disabled = true;

        } else {
            // no error message
            document.getElementById('passwordMatchConfirmMessage').innerHTML = '';
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
