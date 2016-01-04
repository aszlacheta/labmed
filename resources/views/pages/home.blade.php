@extends('layouts.master')

@section('content')

    @if ($alert = Session::get('successfullyLoggedIn'))
        <div class="alert alert-success">{{ $alert }}</div> @endif

    <h1>Witaj na stronie domowej Twojego lab medu!</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, possimus, ullam? Deleniti dicta
        eaque facere, facilis in inventore mollitia officiis porro totam voluptatibus! Adipisci autem cumque enim
        explicabo, iusto sequi.</p>
    <hr>

    <p class="lead">Wybierz typ asortymentu: </p>
    <a href="{{ route('odczynniki.index') }}" class="btn btn-info">Odczynniki</a>
    <a href="{{ route('urzadzenia.index') }}" class="btn btn-info">Urządzenia</a>
    <a href="{{ route('sprzet_jednorazowy.index') }}" class="btn btn-info">Sprzęt jednorazowy</a>
    <a href="{{ route('material_biologiczny.index') }}" class="btn btn-info">Materiał biologiczny</a>

@stop