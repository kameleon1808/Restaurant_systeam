@extends('layouts.app')

@section('year-amount-h')
    <h1>Prihodi po godinama</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Godina:</th>
                <th scope="col">Zarada:</th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr> --}}
            @foreach ($months as $key => $m)
                <tr>
                    <td>
                        <p>{{ $m->year }}</p>
                    </td>
                    <td>
                        <p>{{ $m->total_price }}</p>
                    </td>
                </tr>
            @endforeach
            {{-- </tr> --}}
        </tbody>
    </table>
@endsection
