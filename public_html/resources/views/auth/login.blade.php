@extends('layouts.app2')

@section('content')

    <div class="container">
        <div class="row justify-content-center box effect">
            <div class="col-lg-4 col-md-4 col-sm-4 form-box">
                <img src="{{ asset('img/dlogo-1.png') }}" alt="" width="100" height="100" class="mx-auto d-block">
                <h3 class='text-center'>Welcome to</h3>
                <h1 class="text-center logotitle">MyDiabetic</h1>
                <p class="text-center">Don't have an account?</p>
                <div class='signup'>
                    <a href="{{ route('register') }}" class="mx-auto d-block text-center">Sign Up</a>
                </div>
                
                <div class='game'>
                    <a href="{{ route('play') }}" class="mx-auto d-block text-center">Games</a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 form-box1">
                <h1 class="text-center">Sign In</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label for="email" class="col-md-4 f-label">
                        <h5>{{ __('Email') }}</h5>
                    </label>

                    <div class="col-md-11">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                            {{-- autofocus --}}
                            placeholder="Eg: john@doe.com">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label for="password" class="col-md-4 f-label">
                        <h5>{{ __('Password') }}</h5>
                    </label>

                    <div class="col-md-11">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autofocus autocomplete="current-password"
                            placeholder="Min. 8 characters">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br><br>
                    {{-- here --}}

                    <div class="row f-line">
                        {{-- <div class="col-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-md-right">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                    </div>
                    <button type="submit" class="mx-auto d-block text-center alogin">
                        {{ __('Login') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
