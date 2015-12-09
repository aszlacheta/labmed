@extends('layouts.master')

@section('content')

    <h1>Lista dostępnych odczynników</h1>
    <p class="lead">Poniżej znajdziesz wszystkie istniejące odczynniki.</p>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Firma</th>
            <th>Numer katalogowy</th>
            <th>Ilosc</th>
            <th>Jednostka</th>
            <th>Masa molowa</th>
            <th>Data ważności</th>
            <th>Cena za sztukę</th>
            <th>Data dodania</th>
            <th>Lokalizacja</th>
            <th>Typ</th>
            <th>Temperatura</th>
            <th>Asortyment (ID)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($odczynniki as $odczynnik)
            <tr>
                <td>{{ $odczynnik->id }}</td>
                <td>{{ $odczynnik->nazwa }}</td>
                <td>{{ $odczynnik->firma }}</td>
                <td>{{ $odczynnik->numer_kat }}</td>
                <td>{{ $odczynnik->ilosc }}</td>
                <td>{{ $odczynnik->jednostka }}</td>
                <td>{{ $odczynnik->masa_molowa }}</td>
                <td>{{ $odczynnik->data_waznosci }}</td>
                <td>{{ $odczynnik->cena_za_szt }}</td>
                <td>{{ $odczynnik->data_dodania }}</td>
                <td>{{ $odczynnik->lokalizacja }}</td>
                <td>{{ $odczynnik->odczynnikiTyp->nazwa }}</td>
                <td>{{ $odczynnik->temperatura->wartosc }}</td>
                <td>{{ $odczynnik->asortyment_fk }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <hr>


@stop