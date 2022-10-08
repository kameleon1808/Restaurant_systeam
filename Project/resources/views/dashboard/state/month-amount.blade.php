@extends('layouts.app')

@section('month-amount')
    <h1>Prihodi po mesecima</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mesec:</th>
                <th scope="col">Zarada:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    @foreach ($months as $key => $m)
                        <p>{{ $m }}</p><br>
                    @endforeach
                </td>
                <td>
                    @foreach ($collection as $key => $m)
                        <p>{{ $m }}</p><br>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
@endsection
