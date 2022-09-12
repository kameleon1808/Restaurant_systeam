@extends('layouts.app')

@section('users-amount')
    <h1>Prihodi po korisnicima</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Korisnik:</th>
                <th scope="col">Adresa:</th>
                <th scope="col">Zarada:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $u)
                <tr>
                    <td>
                        <p>{{ $u->name }}</p>
                    </td>
                    <td>
                        <p>{{ $u->address }}</p>
                    </td>
                    <td>
                        <p>{{ $u->total_amount }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Korisnik:</th>
                    <th scope="col">Adresa:</th>
                    <th scope="col">Otkazane porudzbine:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($canceled_ord as $key => $u)
                    <tr>
                        <td>
                            <p>{{ $u->name }}</p>
                        </td>
                        <td>
                            <p>{{ $u->address }}</p>
                        </td>
                        <td>
                            <p>{{ $u->canceled_orders }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
