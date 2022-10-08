<div wire:poll>
    {{-- <div> --}}
    Current time: {{ now() }}

    <form action="{{ route('waiter.createOrder') }}" method="post">
        @csrf
        <input name="article_name" type="text" class="form-control" placeholder="Naziv jela">
        <input name="prod_qty" type="text" class="form-control" placeholder="Kolicina">
        <input name="price" type="text" class="form-control" placeholder="Cena">
        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
            Kreiraj
        </button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Kreirana u:</th>
                <th scope="col">Adresa za isporuku</th>
                <th scope="col">Porucilac</th>
                <th scope="col">Kontakt:</th>
                <th scope="col">Napomene:</th>
                <th scope="col">Racun:</th>
                <th scope="col">Jelo:</th>
                <th scope="col">Kolicina:</th>
                <th scope="col">Akcija:</th>
                <th scope="col">Akcija:</th>
                <th scope="col">Stanje:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->order_date }}</th>
                    <td>{{ $order->shipping_address }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->comments }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->article_name }}</td>
                    <td>{{ $order->prod_qty }}</td>
                    <td>
                        @if ($order->accepted === 'PRIHVACENA')
                            <p></p>
                        @elseif ($order->accepted === 'Prihvati')
                            <form action="{{ route('waiter.accept') }}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <input type="hidden" name="order_date" value="{{ $order->order_date }}">
                                <button type="submit"
                                    class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                    {{ $order->accepted }}
                                </button>
                            </form>
                        @endif
                    </td>
                    <td>
                        @if ($order->accepted === 'Prihvati')
                            <p></p>
                        @elseif ($order->accepted === 'PRIHVACENA')
                            <form action="{{ route('waiter.refuse') }}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <input type="hidden" name="order_date" value="{{ $order->order_date }}">
                                <button type="submit"
                                    class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
                                    OTKAZI
                                </button>
                            </form>
                        @endif
                    </td>
                    <td>
                        @if ($order->canceled == 0)
                            <input type="hidden" name="order_id" value="{{ $order->canceled }}">
                            <button type="button" class="btn btn-outline-success" data-mdb-ripple-color="dark">
                                Na čekanju
                            </button>
                        @elseif ($order->canceled == 1)
                            <input type="hidden" name="order_id" value="{{ $order->canceled }}">
                            <button type="button" class="btn btn-outline-danger" data-mdb-ripple-color="dark">
                                Otkazana
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
