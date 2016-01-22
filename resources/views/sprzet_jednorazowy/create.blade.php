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

    <div class="page-header"><h1>Dodaj nowy sprzęt jednorazowy</h1></div>

    {!! Form::open(['route' => 'sprzet_jednorazowy.store']) !!}

    <div class="container col-md-7">
        <div class="container col-md-11">
            {!! Form::label('nazwa', 'Nazwa') !!}
            {!! Form::text('nazwa', null, ['class' => 'form-control']) !!}
        </div>

        <div class="container col-md-11">
            {!! Form::label('firma', 'Firma') !!}
            {!! Form::text('firma', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('numer_kat', 'Numer katalogowy') !!}
            {!! Form::text('numer_kat', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('pojemnosc', 'Pojemność') !!}
            {!! Form::number('pojemnosc', 1, ['min'=>1, 'class' => 'form-control' ]) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('kalibracja', 'Kalibracja') !!}
            {!! Form::number('kalibracja', 1, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('data_naprawy', 'Data naprawy') !!}
            {!! Form::date('data_naprawy', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('opis_naprawy', 'Opis naprawy') !!}
            {!! Form::textarea('opis_naprawy', null, ['class' => 'form-control', 'rows' => '7']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('data_zakupu', 'Data zakupu') !!}
            {!! Form::date('data_zakupu', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
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
            {!! Form::label('sprzet_jedn_typ_id', 'Typ sprzętu jednorazowego') !!}
            {!! Form::select('sprzet_jedn_typ_id', array(1 => 'piepty', 2 => 'końcówki do pipet', 3 => 'butelki hodowlane', 4 => 'płytki wielodołkowe', 5 => 'szalki', 6 => 'probówki'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('sprzet_jedn_podtyp_id', 'Podtyp sprzętu jednorazowego')!!}
            {!! Form::select('sprzet_jedn_podtyp_id', array(1 => 'automatyczne 0,2-2 µl', 2=> 'automatyczne 0,5-10 µl', 3 => 'automatyczne 10-50 µl',
             4 => 'automatyczne 20-200 µl', 5 => 'automatyczne 100-1000 µl', 6 => 'automatyczne wielokanałowe', 7 => 'serologiczne 1 ml',
             8 => 'serologiczne 2 ml', 9 => 'serologiczne 5 ml', 10 => 'serologiczne 10 ml', 11 => 'serologiczne 25 ml', 12 => 'serologiczne 50 ml',
              13 => 'jednomiarowe', 14 => 'Pasteura', 15 => 'do 20 µl', 16 => 'do 200 µl', 17 => 'do 1000 µl',
              18 => '25 cm2', 19 => '75 cm2', 20 => '225 cm2', 21 => '6-dołkowe', 22 => '12-dołkowe', 23 => '24-dołkowe', 24 => '48-dołkowe',
              25 => '96-dołkowe', 26 => '384-dołkowe', 27 => '1536-dołkowe', 28 => '35mm',
              29 => '60mm', 30 => '100mm', 31 => '150mm', 32 => 'Eppendorf 200 µl', 33 => 'Eppendorf 1,5 ml', 34 => 'Eppendorf 2 ml', 35 => 'flakony 15 ml',
              36 => 'flakony 50 ml', 37 => 'z zamknięciem dwupozycyjnym 5 ml', 38 => 'z zamknięciem dwupozycyjnym 13 ml', 39 => 'do zamrażania'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('asortyment_id', 'Asortyment') !!}
            {!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('ilosc', 'Ilość') !!}
            {!! Form::number('ilosc', 1, ['min'=>1, 'class' => 'form-control' ]) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('cena_za_szt', 'Cena za sztukę') !!}
            {!! Form::number('cena_za_szt', 1, ['class' => 'form-control', 'step' => '0.01']) !!}
        </div>

<div class="col-md-11", style="margin-bottom: 15px">
        {!! Form::submit('Dodaj', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
</div>
    </div>

    {!! Form::close() !!}


@stop