<div wire:poll>
    {{-- <div> --}}
    Current time: {{ now() }}

    <h1>Boss home stranaaaa</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>
    <a href="{{ url('boss/home') }}">Dashboard</a>

    <form action="{{ route('boss.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
            Logout
        </button>
    </form>

    <table class="table">
        <thead>
            <th>id</th>
            <th>user_id</th>
            <th>boss_id</th>
            <th>city</th>
            <th>location</th>
            <th>request</th>
            <th>Action</th>

        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->user_id }}</td>
                    <td>{{ $d->boss_id }}</td>
                    <td>{{ $d->city }}</td>
                    <td>{{ $d->location }}</td>
                    <td>{{ $d->request }}</td>
                    <td>
                        @if ($d->boss_id != null)
                            <form action="{{ route('boss.sendLocation') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $d->id }}">

                                <button type="submit"
                                    class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                    Where is my order
                                </button>
                            </form>
                        @elseif ($d->boss_id == null)
                            @if ($param2 == null)
                                <button onclick="getLocation()">Try It</button>
                            @elseif ($param2 != null)
                                <form action="{{ route('boss.sendLocation') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                    <input type="hidden" name="loc" id="demo">

                                    <button type="submit"
                                        class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">

                                        Posalji lokaciju
                                    </button>
                                </form>
                            @endif
                        @endif
                        @if ($d->boss_id == null)
                            <form action="{{ route('boss.acceptOrder') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                    Prihvati
                                </button>
                            </form>
                        @elseif ($d->boss_id != null)
                            <button>Zapocni isporuku</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="container">
        {{-- <button id="btn-start" onclick="getLocation()">Try It</button> --}}
        <button id="btn-start">Try It</button>


        <input type="text" name="" id="demo">
        {{-- <a href="http://www.google.com/maps/place/44.81710052490234,20.46213912963867">Lokacija</a> --}}


    </div>

    <div class="container">

    </div>
    <script>
        var x = document.getElementById("demo");
        const btnStart = document.getElementById("btn-start");
        let count = 0;

        btnStart.addEventListener("click", function() {
            setInterval(function() {
                console.log("hejj");
                count += 1;

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);

                    function showPosition(position) {
                        x.value = count + ": " +
                            position.coords.latitude + ", " + position.coords.longitude;
                    }
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }

            }, 1000);
        });
    </script>

</div>
