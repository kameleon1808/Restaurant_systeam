@extends('layouts.app')

@section('login-state')
    @if (Auth::check())
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ auth()->guard()->user()->name }}</div>

                        <div class="card-body">
                            <div class="row mb-6">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Vec ste prijavljeni, molimo vas odjavite se!') }}</label>

                                <form action="{{ route('boss.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                        Odjavite se
                                    </button>
                                </form>
                                @if (auth()->guard()->user()->role == 1)
                                    <a href="{{ 'boss/home' }}" type="button"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">Pocetna
                                        strana</a><br>
                                @elseif (auth()->guard()->user()->role == 2)
                                    <a href="{{ 'user/home' }}" type="button"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">Pocetna
                                        strana</a><br>
                                @elseif (auth()->guard()->user()->role == 3)
                                    <a href="{{ 'waiter/home' }}" type="button"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">Pocetna
                                        strana</a><br>
                                @elseif (auth()->guard()->user()->role == 4)
                                    <a href="{{ 'state/home' }}" type="button"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">Pocetna
                                        stranaa</a><br>
                                @elseif (auth()->guard()->user()->role == 5)
                                    <a href="{{ 'legal/home' }}" type="button"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">Pocetna
                                        strana</a><br>
                                @elseif (auth()->guard()->user()->role == 6)
                                    <a href="{{ 'rest-boss/home' }}" type="button"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">Pocetna
                                        strana</a><br>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Ulogujte se za proveru stanja') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

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
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

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
    @endif
@endsection
