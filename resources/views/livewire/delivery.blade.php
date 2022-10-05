<div wire:poll>
    {{-- <div> --}}
    Current time: {{ now() }}

    <h1>Deliverer home stranaaaa</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>
    <h3>{{ auth()->guard()->user()->id }}</h3>

    <form action="{{ route('boss.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
            Logout
        </button>
    </form>

    <table class="table">
        <thead>
            <th>Datum kreiranja</th>
            <th>Narucilac</th>
            <th>Adresa za isporuku</th>
            <th>location</th>
            <th>Action</th>
            <th>Dostavljeno</th>
            <th>Otkazano</th>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->created_at }}</td> {{-- Datum kreiranja --}}
                    <td>{{ $d->order->name }}</td>{{-- Narucilac --}}
                    <td>{{ $d->order->shipping_address }} - {{ $d->city }}</td>{{-- Adresa za isporuku --}}
                    <td>{{-- location --}}
                        <a
                            href="https://yandex.ru/maps/?whatshere[point]={{ $d->location }}&whatshere[zoom]=17">{{ $d->location }}</a>
                    </td>
                    <td>{{-- Action --}}
                        @if ($d->boss_id == null)
                            @if ($d->canceled == 0)
                                <form action="{{ route('boss.acceptOrder') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="ord_id" value="{{ $d->id }}">
                                    <button type="submit">Prihvati</button>
                                </form>
                            @else
                                <p>//</p>
                            @endif
                        @elseif ($d->boss_id != null)
                            @if ($d->request == 1)
                                <form action="{{ route('boss.location') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="ord_id" value="{{ $d->id }}">

                                    <button type="submit">Posalji lokaciju</button>
                                </form>
                            @else
                            @endif
                        @endif
                    </td>
                    <td> {{-- Dostavljeno --}}
                        @if ($d->delivered != 1)
                            @if ($d->canceled == 0)
                                <form action="{{ route('boss.finishDelivery') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="ord_id" value="{{ $d->id }}">
                                    <button type="submit">Zavrsi isporuku</button>
                                </form>
                            @else
                                <p></p>
                            @endif
                        @elseif($d->delivered != 0)
                            <button>Isporuceno</button>
                        @endif
                    </td>
                    <td> {{-- Otkazano --}}
                        @if ($d->canceled == 1)
                            <p>Otkazana</p>
                        @else
                            <p></p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</div>
