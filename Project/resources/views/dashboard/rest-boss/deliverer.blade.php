@extends('layouts.app')

@section('deliverer-h')
    <h1>Deliverer home page</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>
    <br><br>

    <table class="table">
        <thead>
            <th>id</th>
            <th>user_id</th>
            <th>boss_id</th>
            <th>city</th>
            <th>delievered
            <th>
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
                    <td>{{ $d->delievered }}</td>
                    <td>
                        <a
                            href="https://yandex.ru/maps/?whatshere[point]={{ $d->location }}&whatshere[zoom]=17">{{ $d->location }}</a>
                    </td>
                    <td>{{ $d->request }}</td>
                    <td>
                        @if ($d->boss_id == null)
                            <input type="hidden" name="ord_id" value="{{ $d->id }}">
                            <button type="submit">Porudzbina nije u procesu isporuke</button>
                        @elseif ($d->boss_id != null)
                            @if ($d->request == 1)
                                <input type="hidden" name="ord_id" value="{{ $d->id }}">
                                <button type="submit">Porudzbina je u procesu isporuke</button>
                                <input type="text" name="loc" id="demo">
                            @else
                            @endif
                        @endif
                    </td>

                    <td>
                        @if ($d->delivered != 1)
                            <input type="hidden" name="ord_id" value="{{ $d->id }}">
                            <button type="submit">Porudzbina i dalje nije dostavljena</button>
                        @elseif($d->delivered != 0)
                            <button>Isporuceno</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
