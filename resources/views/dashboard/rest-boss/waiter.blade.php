@extends('layouts.app')

@section('waiter-h')
    <h1>Waiter home page</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>
    <br><br>
    <livewire:orders>
    @endsection
