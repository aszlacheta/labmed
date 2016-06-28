@extends('layouts.master')

@section('content')

    <h1>Notatki</h1>
    <p class="lead">Poniżej znajdziesz wszystkie udostępnione przez pozostałych pracowników notatki.</p>

    <a href="{{ route('notatki.create') }}" class="btn btn-info">Dodaj</a>

    <div class="table-responsive">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-2">Tytuł</th>
                <th>Treść</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notatki as $notatka)
                <tr>
                    <td>{{ $notatka->ID }}</td>
                    <td>{{ $notatka->nazwa }}</td>
                    <td>{{ $notatka->opis }}</td>
                    <td><a href="{{ route('notatki.show', $notatka->ID) }}"><img src="/assets/images/settings.png"></a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <hr>


@stop