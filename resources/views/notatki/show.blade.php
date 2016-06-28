@extends('layouts.master')

@section('content')

    {!! Form::open(['method' => 'delete', 'route' => ['notatki.destroy', $notatka->ID]]) !!}

		
	<table class="table table-striped">
        <thead>
        <tr>
            <th class="col-md-1">ID</th>
            <th class="col-md-2">Tytuł</th>
            <th>Data utworzenia / modyfikacji</th>
            <th>e-mail</th>
            <th>nazwa użytkownika</th>
            <th>ID użytkownika</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $notatka->ID }}</td>
                <td>{{ $notatka->nazwa }}</td>
                <td>{{ $notatka->data_utworzenia }}</td>
                <td>{{ $notatka->user_email }}</td>
                <td>{{ $notatka->user_name }}</td>
                <td>{{ $notatka->user_id }}</td>
            </tr>
        </tbody>
    </table>
		
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Treść</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $notatka->opis }}</td>
            </tr>
        </tbody>
    </table>
    <hr>
<a href="{{ route('notatki.edit', $notatka->ID) }}" class="btn btn-info">Edytuj</a>
{!! Form::submit('Usuń', ['class' => 'btn btn-danger'])  !!}


{!! Form::close() !!}

@stop