@extends('layouts.master')

@section('content')

    <h1>Lista dostępnych sprzetów jednorazowych</h1>
    <p class="lead">Poniżej znajdziesz wszystkie istniejące sprzęty jednorazowe.</p>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>nazwa_sprzet_jedn</th>
            <th>numer_kat</th>
            <th>ilosc</th>
            <th>data_zakupu</th>
            <th>data_wymiany</th>
            <th>czas_gwarancji</th>
            <th>lokalizacja</th>
            <th>sprzet_jedn_typ</th>
            <th>sprzet_jedn_podtyp</th>
            <th>asortyment</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sprzet_jednorazowy as $sprzet)
            <tr>
                <td>{{ $sprzet->id }}</td>
                <td>{{ $sprzet->nazwa_sprzet_jedn }}</td>
                <td>{{ $sprzet->numer_kat }}</td>
                <td>{{ $sprzet->ilosc }}</td>
                <td>{{ $sprzet->data_zakupu }}</td>
                <td>{{ $sprzet->data_wymiany }}</td>
                <td>{{ $sprzet->czas_gwarancji }}</td>
                <td>{{ $sprzet->lokalizacja }}</td>
                <td>{{ $sprzet->sprzetJednorazowyTyp->nazwa_sprzet_jedn_typ }}</td>
                <td> {{ $sprzet->sprzetJednorazowyPodtyp->nazwa_sprzet_jedn_podtyp }} </td>
                <td>{{ $sprzet->asortyment }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <hr>


@stop