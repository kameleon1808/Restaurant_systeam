@extends('layouts.app')

@section('total-amount-h')
    <h1>Stanje, </h1>
    <h2>Napomena!!! Da bi porudzbne bile obracunate kuvar mora prihvatiti porudzbinu</h2>
    <h2>Da ne bi dolazilo do obracunavanja nepostojecih prihoda tj neisporucenih jela</h2>

    <h2>prihodi na dnevnom, nedeljnom, mesecnom i godisnjem nivou</h2>
    <hr>
    <h3>Ukupan dosadasnji prihod: {{ $total_sum }}</h3>
    <hr>
    <h3>Prihod ovog dana: {{ $total_sum_today }}</h3>
    <hr>
    <h3>Prihod ove nedelje: {{ $total_sum_week }}</h3>
    <hr>
    <h3>Prihod ovog meseca: {{ $total_sum_month }}</h3>
    <hr>
    <h3>Prihod ove godine: {{ $total_sum_year }}</h3>
    <hr>


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

        </tbody>
    </table>
@endsection
