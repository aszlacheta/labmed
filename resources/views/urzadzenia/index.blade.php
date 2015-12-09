@extends('layouts.master')

@section('content')

    <h1>Lista dostępnych urządzeń</h1>
    <p class="lead">Poniżej znajdziesz wszystkie istniejące urządzenia.</p>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>nazwa_urzadzenia</th>
            <th>numer_kat</th>
            <th>data_zakupu</th>
            <th>data_wymiany_filtr</th>
            <th>czas_gwarancji</th>
            <th>lokalizacja</th>
            <th>urzadzenia_typ_id</th>
            <th>asortyment_id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($urzadzenia as $urzadzenie)
            <tr>
                <td>{{ $urzadzenie->id }}</td>
                <td>{{ $urzadzenie->nazwa_urzadzenia }}</td>
                <td>{{ $urzadzenie->numer_kat }}</td>
                <td>{{ $urzadzenie->data_zakupu }}</td>
                <td>{{ $urzadzenie->data_wymiany_filtr }}</td>
                <td>{{ $urzadzenie->czas_gwarancji }}</td>
                <td>{{ $urzadzenie->lokalizacja }}</td>
                <td>{{ $urzadzenie->urzadzeniaTyp->nazwa }}</td>
                <td>{{ $urzadzenie->asortyment_id }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <hr>


@stop