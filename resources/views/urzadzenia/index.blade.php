@extends('layouts.master')

@section('content')

    <h1>Lista dostępnych urządzeń</h1>
    <p class="lead">Poniżej znajdziesz wszystkie istniejące urządzenia.</p>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Numer kat.</th>
            <th>Data zakupu</th>
            <th>Data wymiany filtra</th>
            <th>Czas gwarancji</th>
            <th>Lokalizacja</th>
            <th>Typ</th>
            <th>Asortyment</th>
            <th>Ilość</th>
        </tr>
        </thead>
        <tbody>
        @foreach($urzadzenia as $urzadzenie)
            <tr>
                <td>{{ $urzadzenie->ID }}</td>
                <td>{{ $urzadzenie->nazwa }}</td>
                <td>{{ $urzadzenie->numer_kat }}</td>
                <td>{{ $urzadzenie->data_zakupu }}</td>
                <td>{{ $urzadzenie->data_wymiany_filtr }}</td>
                <td>{{ $urzadzenie->czas_gwarancji }}</td>
                <td>{{ $urzadzenie->lokalizacja }}</td>
                <td>{{ $urzadzenie->urzadzenie_typ_id }}</td>
                <td>{{ $urzadzenie->asortyment_id }}</td>
                <td>{{ $urzadzenie->ilosc }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <hr>


@stop