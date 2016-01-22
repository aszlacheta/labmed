@extends('layouts.master')

@section('content')




{!! Form::open(['method' => 'delete', 'route' => ['urzadzenia.destroy', $urzadzenie->ID]]) !!}

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
            </tr>
        </tbody>
    </table>
    <hr>
<a href="{{ route('urzadzenia.edit', $urzadzenie->ID) }}" class="btn btn-info">Edytuj</a>
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}


{!! Form::close() !!}



@stop