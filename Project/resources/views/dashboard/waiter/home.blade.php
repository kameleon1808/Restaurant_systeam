@extends('layouts.app')

@section('home-w')
    <h1>Konobar home strana</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>

    <form action="{{ route('waiter.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
            Logout
        </button>
    </form>

    <a type="button" href="{{ url('waiter/porudzbine') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Porudzbine
    </a>
@endsection
