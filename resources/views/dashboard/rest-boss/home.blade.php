@extends('layouts.app')

@section('home-rb')
    <h1>Restaurant boss home strana</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>
    <br><br>


    <div class="row">
        <div class="col-md-6">
            <h3>Dostavljaci</h3>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone number</th>
                </thead>
                <tbody>
                    @foreach ($deliverers as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->address }}</td>
                            <td>{{ $d->phone }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <a href="{{ route('rest-boss.showOrder') }}" type="button"
                                class="btn btn-outline-primary">Proverite dostave</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- //-------------------------------------------------- --}}
        </div>
        <div class="col-md-6">
            <h3>Konobari</h3>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone number</th>
                </thead>
                <tbody>
                    @foreach ($waiters as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->address }}</td>
                            <td>{{ $d->phone }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <a href="{{ route('rest-boss.showOrders') }}" type="button"
                                class="btn btn-outline-primary">Proverite porudzbine</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- //-------------------------------------------------- --}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3>Zaposleni zaduzeni za stanje</h3>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone number</th>
                </thead>
                <tbody>
                    @foreach ($states as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->address }}</td>
                            <td>{{ $d->phone }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <a href="{{ route('rest-boss.statePage') }}" type="button"
                                class="btn btn-outline-primary">Proverite stanje</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- //-------------------------------------------------- --}}
        </div>
        <div class="col-md-6">
            <h3>Sef restorana</h3>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone number</th>
                </thead>
                <tbody>
                    @foreach ($rest_boss as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->address }}</td>
                            <td>{{ $d->phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tr>
                    <td>
                        <form action="{{ route('rest-boss.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">Logout</button>
                        </form>
                    </td>
                </tr>
            </table>
            {{-- //-------------------------------------------------- --}}
        </div>
    </div>
@endsection
