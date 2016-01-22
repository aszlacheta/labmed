@extends('layouts.master')

@section('content')

    <h1>Lista dostępnych odczynników</h1>
    <p class="lead">Poniżej znajdziesz wszystkie istniejące odczynniki.</p>
<<<<<<< HEAD
	<a href="{{ route('odczynniki.create') }}" class="btn btn-info">Dodaj</a>
=======
    <a href="{{ route('odczynniki.create') }}" class="btn btn-info">Dodaj</a>
>>>>>>> c449a277093a29d841959b942034b33bdd99aba5
    <hr>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Firma</th>
            <th>Numer kat.</th>
            <th>Ilość</th>
            <th>Jednostka</th>
            <th>Masa molowa</th>
            <th>Data ważności</th>
            <th>Cena za sztukę</th>
            <th>Data dodania</th>
            <th>Lokalizacja</th>
            <th>Temperatura</th>
            <th>Typ</th>
            <th>Asortyment</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($odczynniki as $odczynnik)
            <tr>
                <td>{{ $odczynnik->ID }}</td>
                <td>{{ $odczynnik->nazwa }}</td>
                <td>{{ $odczynnik->firma }}</td>
                <td>{{ $odczynnik->numer_kat }}</td>
                <td>{{ $odczynnik->ilosc }}</td>
                <td>{{ $odczynnik->jednostka }}</td>
                <td>{{ $odczynnik->masa_molowa }}</td>
                <td>{{ $odczynnik->data_waznosci }}</td>
                <td>{{ number_format($odczynnik->cena_za_szt, 2) }}</td>
                <td>{{ $odczynnik->data_dodania }}</td>
                <td>{{ $odczynnik->lokalizacja }}</td>
                <td>{{ number_format($odczynnik->temperatura, 1) }}</td>
                <td>{{ $odczynnik->typ->typ }}</td>
                <td>{{ $odczynnik->asortyment->nazwa }}</td>
                <td><a href="{{ route('odczynniki.show', $odczynnik->ID) }}">zarządzaj</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <hr>


@stop