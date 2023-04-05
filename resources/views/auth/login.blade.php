@extends('layouts.app')

@section('content')
<section class="vh-100">
    <style>
        input[type='email'],
        input[type='password'] {
            border: 1px solid #3333;
            padding: 8px;
            font-size: 17px;
            box-shadow: 0px 0px 1px 0px #343a40;

        }
    </style>
    <div class="content text-center">
        @if(session('status'))
        <div class="alert alert-success text-white" id="error_message">
            {{ session('status') }}😊
        </div>
        @endif
    </div>

    <div class="py-5 h-100">
        <div class="d-flex justify-content-center align-items-center h-70 container">
            <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-12 d-flex align-items-center h-100 "></div>
                    <div class="col-md-6 col-lg-7 card-body">
                        <div class="  p-4 p-lg-5 text-black">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="d-flex align-items-center mb-3 pb-1">
                                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                    <span class="h1 fw-bold mb-0">Blogs</span>
                                </div>

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">{{ __('Login') }} into your account</h5>


                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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

                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                    </div>
                                    <div class="d-flex p-3 " style="justify-content: space-between;">
                                        <span style="float:inline-start">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </span>
                                        <span style="float:inline-start">

                                            @if (Route::has('register'))
                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ route('register') }}" class="text-warning" style="font-weight:500; padding:10px; font-size:17px;">Register here..</a></p>

                                            @endif
                                        </span>

                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp" alt="login form" class="img-fluid" style="border-radius: 0 1rem  1rem 0;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection