@extends('layouts.master')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-header" xmlns="http://www.w3.org/1999/html"><h1>Dodaj nowe urządzenie</h1></div>


    {!! Form::open(['route' => 'urzadzenia.store']) !!}
    <div class="container col-md-7">

        <div class="form-group col-md-11">
            {!! Form::label('nazwa', 'Nazwa') !!}
            {!! Form::text('nazwa', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('numer_kat', 'Numer katalogowy') !!}
            {!! Form::text('numer_kat', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('data_zakupu', 'Data zakupu') !!}
            {!! Form::date('data_zakupu', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('data_wymiany_filtr', 'Data wymiany filtra') !!}
            {!! Form::date('data_wymiany_filtr', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('czas_gwarancji', 'Czas gwarancji') !!}
            {!! Form::date('czas_gwarancji', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('lokalizacja', 'Lokalizacja') !!}
            {!! Form::text('lokalizacja', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('urzadzenie_typ_id', 'Typ urządzenia') !!}
            {!! Form::select('urzadzenie_typ_id', array(1 => 'komory laminarne', 2 => 'urządzenia pomiarowe', 3 => 'drobny sprzęt labolatoryjny', 4 => 'wirówki', 5 => 'worteksy', 6 => 'mieszadła', 7 => 'pipetory'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('asortyment_id', 'Asortyment') !!}
            {!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('ilosc', 'Ilość') !!}
            {!! Form::number('ilosc', 1, ['min'=>1, 'class' => 'form-control']) !!}
        </div>

        <div class="col-md-11" style="margin-bottom: 15px">
            {!! Form::submit('Dodaj', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
        </div>

    </div>
    {!! Form::close() !!}

@stop