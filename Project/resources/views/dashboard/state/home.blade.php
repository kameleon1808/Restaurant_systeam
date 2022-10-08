@extends('layouts.app')

@section('home-s')
    <h1>Stanje home strana</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>

    <form action="{{ route('state.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
            Logout
        </button>
    </form>

    <a type="button" href="{{ url('state/porucivana-jela') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Najcesce porucivana jela
    </a>

    <a type="button" href="{{ url('state/prihodi') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Prihodi
    </a>

    <a type="button" href="{{ url('state/mesecni-prihodi') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Prihodi po mesecima
    </a>

    <a type="button" href="{{ url('state/godisnji-prihodi') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Prihodi po godinama
    </a>
    <a type="button" href="{{ url('state/korisnici-prihodi') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Prihodi po korisnicima
    </a>
@endsection
