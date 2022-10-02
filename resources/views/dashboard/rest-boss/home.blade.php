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
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($deliverers as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->address }}</td>
                            <td>{{ $d->phone }}</td>
                            <td>
                                <form action="{{ route('rest-boss.deleteStaff') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                    <button type="submit" class="btn btn-danger">Remove</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <form action="{{ route('rest-boss.addDeliverer') }}" method="post">
                            @csrf
                            <td><input type="text" name="name" placeholder="name"></td>
                            <td><input type="text" name="email" placeholder="email"></td>
                            <td><input type="text" name="address" placeholder="address"></td>
                            <td><input type="text" name="phone" placeholder="phone"></td>
                            <td><input type="text" name="username" placeholder="username"></td>
                            <td><input type="password" name="password" placeholder="password"></td>

                            <td><button type="submit" class="btn btn-primary">Add</button></td>
                        </form>
                    </tr>
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
    </div>
    <div class="row">
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
                            <td>
                                <form action="{{ route('rest-boss.deleteStaff') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                    <button type="submit" class="btn btn-danger">Remove</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <form action="{{ route('rest-boss.addWaiter') }}" method="post">
                            @csrf
                            <td><input type="text" name="name" placeholder="name"></td>
                            <td><input type="text" name="email" placeholder="email"></td>
                            <td><input type="text" name="address" placeholder="address"></td>
                            <td><input type="text" name="phone" placeholder="phone"></td>
                            <td><input type="text" name="username" placeholder="username"></td>
                            <td><input type="password" name="password" placeholder="password"></td>

                            <td><button type="submit" class="btn btn-primary">Add</button></td>
                        </form>
                    </tr>
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
                            <td>
                                <form action="{{ route('rest-boss.deleteStaff') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                    <button type="submit" class="btn btn-danger">Remove</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <form action="{{ route('rest-boss.addState') }}" method="post">
                            @csrf
                            <td><input type="text" name="name" placeholder="name"></td>
                            <td><input type="text" name="email" placeholder="email"></td>
                            <td><input type="text" name="address" placeholder="address"></td>
                            <td><input type="text" name="phone" placeholder="phone"></td>
                            <td><input type="text" name="username" placeholder="username"></td>
                            <td><input type="password" name="password" placeholder="password"></td>

                            <td><button type="submit" class="btn btn-primary">Add</button></td>
                        </form>
                    </tr>
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
        <div class="row">
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
                                <td>
                                    <form action="{{ route('rest-boss.deleteStaff') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                        <button type="submit" class="btn btn-danger">Remove</button>

                                    </form>
                                </td>
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
