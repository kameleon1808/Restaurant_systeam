@extends('layouts.app')

@section('home')
    <div class="container">
        @if (Auth::check())
            @if (auth()->guard()->user()->role == 1)
                <h1>Dobrodosli {{ auth()->guard()->user()->name }}</h1>
                <a href="{{ 'boss/home' }}" type="button" class="btn btn-primary">Pocetna strana</a><br>
            @elseif (auth()->guard()->user()->role == 2)
                <h1>Dobrodosli {{ auth()->guard()->user()->name }}</h1>
                <a href="{{ 'user/home' }}" type="button" class="btn btn-primary">Pocetna strana</a><br>
            @elseif (auth()->guard()->user()->role == 3)
                <h1>Dobrodosli {{ auth()->guard()->user()->name }}</h1>
                <a href="{{ 'waiter/home' }}" type="button" class="btn btn-primary">Pocetna strana</a><br>
            @elseif (auth()->guard()->user()->role == 4)
                <h1>Dobrodosli {{ auth()->guard()->user()->name }}</h1> 
                <a href="{{ 'state/home' }}" type="button" class="btn btn-primary">Pocetna stranaa</a><br>
            @elseif (auth()->guard()->user()->role == 5)
                <h1>Dobrodosli {{ auth()->guard()->user()->name }}</h1>
                <a href="{{ 'legal/home' }}" type="button" class="btn btn-primary">Pocetna strana</a><br>
            @elseif (auth()->guard()->user()->role == 6)
                <h1>Dobrodosli {{ auth()->guard()->user()->name }}</h1>
                <a href="{{ 'rest-boss/home' }}" type="button" class="btn btn-primary">Pocetna strana</a><br>
            @endif
        @else
            <h1>Izaberite vas restoran</h1>

            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                @foreach ($restaurants as $rest)
                    <a href="{{ 'address/' . $rest->name }}" type="button"
                        class="btn btn-primary">{{ $rest->name }}</a><br>
                    <input type="hidden" name="name" value="{{ $rest->name }}">
                @endforeach
            </div>
        @endif
    </div>
@endsection
