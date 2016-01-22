@extends('layouts.master')

@section('content')




{!! Form::open(['method' => 'delete', 'route' => ['material_biologiczny.destroy', $material->ID]]) !!}

	<hr>
    <table class="table table-striped" style="margin-left: -90px">
        <thead>
        <tr>
            <th>ID</th>
            <th>Rodzaj komórek</th>
            <th>Rodzaj tkanki</th>
            <th>Firma</th>
            <th>Data dostarczenia</th>
            <th>Data izolacji</th>
            <th>Organizm</th>
            <th>Data zamrożenia</th>
            <th>Temperatura przechowywania</th>
            <th>Ilość komórek</th>
            <th>Stężenie RNA</th>
            <th>Stężenie DNA</th>
            <th>Objętość tkanki</th>
            <th>Sposób utrwalenia</th>
            <th>Obserwacje</th>
            <th>Rodzaj probówki</th>
            <th>Stężęnie</th>
            <th>Objętość próbki</th>
            <th>Data gwarancji</th>
            <th>Lokalizacja</th>
            <th>Typ</th>
            <th>Asortyment</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $material->ID }}</td>
                <td>{{ $material->rodzaj_komorek }}</td>
                <td>{{ $material->rodzaj_tkanki }}</td>
                <td>{{ $material->firma }}</td>
                <td>{{ $material->data_dostarczenia }}</td>
                <td>{{ $material->data_izolacji }}</td>
                <td>{{ $material->organizm }}</td>
                <td>{{ $material->data_zamrozenia }}</td>
                <td>{{ number_format($material->temperatura_przechowywania, 1) }}</td>
                <td>{{ $material->ilosc_komorek }}</td>
                <td>{{ number_format($material->stezenie_RNA, 2) }}</td>
                <td>{{ number_format($material->stezenie_DNA, 2) }}</td>
                <td>{{ number_format($material->objetosc_tkanki, 2) }}</td>
                <td>{{ $material->sposob_utrwalenia }}</td>
                <td>{{ $material->obserwacje }}</td>
                <td>{{ $material->rodzaj_probowki }}</td>
                <td>{{ $material->stezenie }}</td>
                <td>{{ number_format($material->objetosc_probki, 2) }}</td>
                <td>{{ $material->data_gwarancji }}</td>
                <td>{{ $material->lokalizacja }}</td>
                <td>{{ $material->typ->nazwa }}</td>
                <td>{{ $material->asortyment->nazwa }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
<a href="{{ route('material_biologiczny.edit', $material->ID) }}" class="btn btn-info">Edytuj</a>
{!! Form::submit('Usuń', ['class' => 'btn btn-danger']) !!}


{!! Form::close() !!}



@stop