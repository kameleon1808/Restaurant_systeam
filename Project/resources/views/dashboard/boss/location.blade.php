<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @livewireStyles
    <script>
        function loc() {
            var x = document.getElementById("demo");
            const btnStart = document.getElementById("btn-start");

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);

                function showPosition(position) {
                    // x.value = count + ": " +
                    //     position.coords.latitude + ", " + position.coords.longitude;
                    x.value = position.coords.longitude + ", " + position.coords.latitude;
                    btnStart.style.display = 'none';
                }
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        // }, 1000);
        // });
    </script>
</head>

<body onload="loc()">

    <div class="row">
        <div class="container text-center">
            <h1>Location strana</h1>

            <button id="btn-start">Posalji lokaciju</button>


            <form action="{{ route('boss.sendLocation') }}" method="post">
                @csrf
                <input type="hidden" name="ord_id" value="{{ $id }}">
                <input type="text" name="loc" id="demo"><br>

                <button type="submit">Posaljite lokaciju</button>
            </form>

        </div>
    </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @livewireScripts
</body>

</html>



{{-- @endsection --}}
