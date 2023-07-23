@extends('layouts.app')

@section('content')
<style>
    /* Custom styles for the login page */

    body {
        background-color:  rgb(73, 148, 148);
    }

    .card {
        border-radius: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 8px solid black;
    }

    .card-header {
        font-size: 24px;
        font-weight: bold;
        background-color: lightblue;
        color: black;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        text-align: center;
    }

    .card-body {
        background-color: lightcyan;
        padding: 20px;
    }

    /* Primary button style */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    /* Form style */
    .form-control {
        border-radius: 10px;
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
    }

    /* Checkbox style */
    .form-check-input:checked {
        background-color: #007bff;
    }

    /* Error message style */
    .invalid-feedback {
        color: #dc3545;
    }

    /* Link style */
    .btn-link {
        color: #007bff;
    }

    .btn-link:hover {
        text-decoration: underline;
    }

    /* Container styles */
    .container {
        margin-top: 50px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login to Your Account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
