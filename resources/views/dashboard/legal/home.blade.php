@extends('layouts.app')

@section('home-l')
    <h1>Legal home strana</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>

    <form action="{{ route('legal.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
            Logout
        </button>
    </form>
@endsection
