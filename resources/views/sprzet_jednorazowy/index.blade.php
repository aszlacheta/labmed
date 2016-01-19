@extends('layouts.master')

@section('content')

    <h1>Lista dostępnych sprzetów jednorazowych</h1>
    <p class="lead">Poniżej znajdziesz wszystkie istniejące sprzęty jednorazowe.</p>
    <a href="{{ route('sprzet_jednorazowy.create') }}">Dodaj</a>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Firma</th>
            <th>Numer kat.</th>
            <th>Pojemność</th>
            <th>Kalibracja</th>
            <th>Data naprawy</th>
            <th>Opis naprawy</th>
            <th>Data zakupu</th>
            <th>Data wymiay filtra</th>
            <th>Czas gwarancji</th>
            <th>Lokalizacja</th>
            <th>Typ</th>
            <th>Podtyp</th>
            <th>Asortyment</th>
            <th>Ilość</th>
            <th>Cena za szt.</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sprzet_jednorazowy as $sprzet)
            <tr>
                <td>{{ $sprzet->ID }}</td>
                <td>{{ $sprzet->nazwa }}</td>
                <td>{{ $sprzet->firma }}</td>
                <td>{{ $sprzet->numer_kat }}</td>
                <td>{{ $sprzet->pojemnosc }}</td>
                <td>{{ $sprzet->kalibracja }}</td>
                <td>{{ $sprzet->data_naprawy }}</td>
                <td>{{ $sprzet->opis_naprawy }}</td>
                <td>{{ $sprzet->data_zakupu }}</td>
                <td>{{ $sprzet->data_wymiany_filtr }}</td>
                <td>{{ $sprzet->czas_gwarancji }}</td>
                <td>{{ $sprzet->lokalizacja }}</td>
                <td>{{ $sprzet->typ->nazwa }}</td>
                <td>{{ $sprzet->podtyp->nazwa }}</td>
                <td>{{ $sprzet->asortyment->nazwa }}</td>
                <td>{{ $sprzet->ilosc }}</td>
                <td>{{ $sprzet->cena_za_szt }}</td>
                <td><td><a href="{{ route('sprzet_jednorazowy.show', $sprzet->ID) }}">zarządzaj</a></td></td>

            </tr>
        @endforeach

        </tbody>
    </table>
    <hr>


@stop