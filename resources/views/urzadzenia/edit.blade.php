@extends('layouts.master')

@section('content')
    
    {!! Form::model($urzadzenie,['method' => 'patch', 'route' => ['urzadzenia.update', $urzadzenie->ID]]) !!}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-header"><h1>Wprowadź zmiany dla urządzenia</h1></div>

    <div class="container col-md-7">
        <div class="form-group col-md-11">
            {!! Form::label('nazwa', 'Nazwa') !!}
            {!! Form::text('nazwa', $urzadzenie->nazwa, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('numer_kat', 'Numer katalogowy') !!}
            {!! Form::text('numer_kat', $urzadzenie->numer_kat, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('data_zakupu', 'Data zakupu') !!}
            {!! Form::date('data_zakupu', $urzadzenie->data_zakupu, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('data_wymiany_filtr', 'Data wymiany filtra') !!}
            {!! Form::date('data_wymiany_filtr', $urzadzenie->data_wymiany_filtr, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('czas_gwarancji', 'Czas gwarancji') !!}
            {!! Form::date('czas_gwarancji', $urzadzenie->czas_gwarancji, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('lokalizacja', 'Lokalizacja') !!}
            {!! Form::text('lokalizacja', $urzadzenie->lokalizacja, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('urzadzenie_typ_id', 'Typ urządzenia') !!}
            {!! Form::select('urzadzenie_typ_id', array(1 => 'komory laminarne', 2 => 'urządzenia pomiarowe', 3 => 'drobny sprzęt labolatoryjny', 4 => 'wirówki', 5 => 'worteksy', 6 => 'mieszadła', 7 => 'pipetory'), $urzadzenie->urzadzenie_typ_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-5">
            {!! Form::label('asortyment_id', 'Asortyment') !!}
            {!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), $urzadzenie->asortyment_id, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('ilosc', 'Ilość') !!}
            {!! Form::number('ilosc', $urzadzenie->ilosc, ['min'=>1, 'class' => 'form-control']) !!}
        </div>

        <div class="col-md-11" style="margin-bottom: -15px">
            {!! Form::submit('Zatwierdź', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@stop