@extends('layouts.app')

@section('address')
    <div class="container">
        <h1>Izaberite adresu vaseg restorana</h1>

        <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
            @foreach ($locations as $rest)
                <a href="{{ url('role') }}" type="button" class="btn btn-primary">{{ $rest->address }}</a><br>
                <input type="hidden" name="address" value="{{ $rest->address }}">
            @endforeach
        </div>
    </div>
@endsection
