@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 rounded-3">
        <div class="container py-5">
            <div class="logo_laravel mb-4">
                {{-- <img src="/images/logo/logo-teal-titolo.svg" alt=""> --}}
            </div>
            <h1 class="display-5 fw-bold">
                Welcome to DeliveBoo for business management
            </h1>

            <p class="col-md-8 fs-4">This is a platform where business owners can manage and edit data related to their
                business</p>
            <div class="mt-3">
                <h3>Start with logging in or registering to our website:</h3>
                <div class="d-flex gap-3 mt-4">
                    <a class="btn" style="background-color: #00CCBC" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="btn" style="background-color: #00CCBC"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>
            </div>

        </div>
    </div>
@endsection
