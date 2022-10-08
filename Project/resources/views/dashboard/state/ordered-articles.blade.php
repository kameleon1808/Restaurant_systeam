@extends('layouts.app')

@section('ordered-art')
    <h1>Stanje, </h1>

    <h2>najcesce porucivana jela</h2>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Naziv jela:</th>
                <th scope="col">Broj porucivanja:</th>
                <th scope="col">Jedinicna cena jela:</th>
                <th scope="col">Ukupan prihod</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article => $art)
                @foreach ($art as $a)
                    <tr>
                        <td>{{ $article }}</td>
                        <th scope="row">{{ $a->cart_count }}</th>
                        <td>{{ $a->price }}</td>
                        <td>{{ $a->cart_count * $a->price }}</td>
                    </tr>
                @endforeach
            @endforeach
            <tr>
                <th>Ukupan prihod:</th>
                <th>{{ $sum }}</th>
            </tr>
        </tbody>
    </table>
@endsection
