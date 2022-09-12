@extends('layouts.app')

@section('role')
    <div class="container">
        <h1>Izaberite vasu ulogu</h1>

        <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
            {{-- <a href="{{ url('boss/login-sef') }}" class="btn btn-primary">Sef</a>
            <a href="{{ url('waiter/login-konobar') }}" class="btn btn-primary">Konobar</a>
            <a href="{{ url('state/login-stanje') }}" class="btn btn-primary">Stanje </a> --}}

            <a href="{{ url('login-konobar') }}" class="btn btn-primary">Konobar</a>
            <a href="{{ url('login-sef') }}" class="btn btn-primary">Dostavljac</a>
            <a href="{{ url('login-stanje') }}" class="btn btn-primary">Analitika</a>
            <a href="{{ url('login-rest-boss') }}" class="btn btn-primary">Sef</a>

        </div>
    @endsection
