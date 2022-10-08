@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Welcome ') }} {{ auth()->guard()->user()->name }}
                        @if (auth()->guard()->user()->role == 2)
                            <a href="{{ route('user.index') }}" type="button" class="btn btn-primary">Home page</a>
                        @elseif (auth()->guard()->user()->role == 5)
                            <a href="{{ route('legal.index') }}" type="button" class="btn btn-primary">Home page</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
