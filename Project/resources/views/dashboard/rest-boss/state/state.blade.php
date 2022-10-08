@extends('layouts.app')

@section('state-h')
    <h1>State home page</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>
    <br><br>

    <a type="button" href="{{ url('rest-boss/porucivana-jela') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Najcesce porucivana jela
    </a>

    <a type="button" href="{{ url('rest-boss/prihodi') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Prihodi
    </a>

    <a type="button" href="{{ url('rest-boss/mesecni-prihodi') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Prihodi po mesecima
    </a>

    <a type="button" href="{{ url('rest-boss/godisnji-prihodi') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Prihodi po godinama
    </a>
    <a type="button" href="{{ url('rest-boss/korisnici-prihodi') }}"
        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
        Prihodi po korisnicima
    </a>
@endsection
