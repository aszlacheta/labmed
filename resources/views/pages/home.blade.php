@extends('layouts.master')

@section('content')

    @if ($alert = Session::get('successfullyLoggedIn'))
        <div class="alert alert-success">{{ $alert }}</div> @endif

    <h1>Witaj na stronie domowej Twojego lab medu!</h1>
    <hr>

    <p class="lead">Wybierz typ asortymentu: </p>
    <a href="{{ route('odczynniki.index') }}" class="btn btn-info">Odczynniki</a>
    <a href="{{ route('urzadzenia.index') }}" class="btn btn-info">Urządzenia</a>
    <a href="{{ route('sprzet_jednorazowy.index') }}" class="btn btn-info">Sprzęt jednorazowy</a>
    <a href="{{ route('material_biologiczny.index') }}" class="btn btn-info">Materiał biologiczny</a>

	<p class="lead">Dodatkowe narzędzia: </p>
	<a href="{{ route('kalkulator.index') }}" class="btn btn-info">Kalkulatory chemiczne</a>

@stop