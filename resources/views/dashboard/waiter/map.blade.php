@extends('layouts.app')

@section('map')
    <div class="container">
        <p>Click the button to get your coordinates.</p>

        <button onclick="getLocation()">Try It</button>

        <p id="demo"></p>

    </div>
    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
        }
    </script>
@endsection
