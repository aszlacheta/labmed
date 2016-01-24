@extends('layouts.master')

@section('content')

    <h1>Lista dostępnych urządzeń</h1>
    <p class="lead">Poniżej znajdziesz wszystkie istniejące urządzenia.</p>
    <a href="{{ route('urzadzenia.create') }}" class="btn btn-info">Dodaj</a>
    <hr>

    <div class="table-responsive">
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
                <th></th>
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
                    <td>{{ $urzadzenie->typ->typ }}</td>
                    <td>{{ $urzadzenie->asortyment->nazwa }}</td>
                    <td>{{ $urzadzenie->ilosc }}</td>
                    <td>
                    <td><a href="{{ route('urzadzenia.show', $urzadzenie->ID) }}"><img
                                    src="../resources/views/images/settings.png"></a></td>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <hr>


@stop