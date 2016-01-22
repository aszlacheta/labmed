@extends('layouts.master')

@section('content')




{!! Form::open(['method' => 'delete', 'route' => ['sprzet_jednorazowy.destroy', $sprzet->ID]]) !!}

	<hr>
    <table class="table table-striped" style="margin-left: -90px">
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
        </tr>
        </thead>
        <tbody>
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
                <td>{{ number_format($sprzet->cena_za_szt, 2) }}</td>

            </tr>
        </tbody>
    </table>
    <hr>
	
<a href="{{ route('sprzet_jednorazowy.edit', $sprzet->ID) }}" class="btn btn-info">Edytuj</a>
{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}


{!! Form::close() !!}



@stop