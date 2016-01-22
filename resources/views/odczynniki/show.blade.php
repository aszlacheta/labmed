@extends('layouts.master')

@section('content')




<<<<<<< HEAD
{!! Form::open(['method' => 'delete', 'route' => ['odczynniki.destroy', $odczynnik->ID]]) !!}

	<hr>
=======
    {!! Form::open(['method' => 'delete', 'route' => ['odczynniki.destroy', $odczynnik->ID]]) !!}

    <hr>
>>>>>>> c449a277093a29d841959b942034b33bdd99aba5
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
        </tr>
        </thead>
        <tbody>
<<<<<<< HEAD
            <tr>
                <td>{{ $odczynnik->ID }}</td>
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
                <td>{{ $odczynnik->temperatura }}</td>
                <td>{{ $odczynnik->typ->typ }}</td>
                <td>{{ $odczynnik->asortyment->nazwa }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
<a href="{{ route('odczynniki.edit', $odczynnik->ID) }}" class="btn btn-info">Edytuj</a>
{!! Form::submit('Usuń', ['class' => 'btn btn-danger'])  !!}


{!! Form::close() !!}
=======
        <tr>
            <td>{{ $odczynnik->ID }}</td>
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
            <td>{{ $odczynnik->temperatura }}</td>
            <td>{{ $odczynnik->typ->typ }}</td>
            <td>{{ $odczynnik->asortyment->nazwa }}</td>
        </tr>
        </tbody>
    </table>
    <hr>
    <a href="{{ route('odczynniki.edit', $odczynnik->ID) }}" class="btn btn-info">Edytuj</a>
    {!! Form::submit('Usuń', ['class' => 'btn btn-danger'])  !!}


    {!! Form::close() !!}
>>>>>>> c449a277093a29d841959b942034b33bdd99aba5



@stop