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

    <div class="page-header"><h1>Dodaj nowy materiał biologiczny</h1></div>

    {!! Form::open(['route' => 'material_biologiczny.store']) !!}

    <div class="container col-md-7">

        <div class="form-group col-md-5">
            {!! Form::label('rodzaj_komorek', 'Rodzaj komórek') !!}
            {!! Form::text('rodzaj_komorek', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('rodzaj_tkanki', 'Rodzaj tkanki') !!}
            {!! Form::text('rodzaj_tkanki', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('firma', 'Firma') !!}
            {!! Form::text('firma', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('data_dostarczenia', 'Data dostarczenia') !!}
            {!! Form::date('data_dostarczenia', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('data_izolacji', 'Data izolacji') !!}
            {!! Form::date('data_izolacji', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('organizm', 'Organizm') !!}
            {!! Form::text('organizm', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('data_zamrozenia', 'Data zamrożenia') !!}
            {!! Form::date('data_zamrozenia', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('temperatura_przechowywania', 'Temperatura przechowywania') !!}
            {!! Form::number('temperatura_przechowywania', null, ['step' => '0.1', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('ilosc_komorek', 'Ilość komórek') !!}
            {!! Form::number('ilosc_komorek', 1, ['min'=>1, 'class' => 'form-control' ]) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('stezenie_RNA', 'Stężenie RNA') !!}
            {!! Form::number('stezenie_RNA', null, ['step' => '0.01', 'min' => '0', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('stezenie_DNA', 'Stężenie DNA') !!}
            {!! Form::number('stezenie_DNA', null, ['step' => '0.01', 'min' => '0', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('objetosc_tkanki', 'Objętość tkanki') !!}
            {!! Form::number('objetosc_tkanki', null, ['class' => 'form-control', 'step' => '0.01', 'min' => '0']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('sposob_utrwalenia', 'Sposób utrwalenia') !!}
            {!! Form::textarea('sposob_utrwalenia', null, ['class' => 'form-control', 'rows' => '8']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('obserwacje', 'Obserwacje') !!}
            {!! Form::textarea('obserwacje', null, ['class' => 'form-control', 'rows' => '8']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('rodzaj_probowki', 'Rodzaj próbówki') !!}
            {!! Form::text('rodzaj_probowki', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('stezenie', 'Stężenie') !!}
            {!! Form::number('stezenie', 1, ['step' => '1', 'min' => '0', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('objetosc_probki', 'Objętość próbki') !!}
            {!! Form::number('objetosc_probki', null, ['step' => '0.01', 'min' => '0', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('data_gwarancji', 'Data gwarancji') !!}
            {!! Form::date('data_gwarancji', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('lokalizacja', 'Lokalizacja') !!}
            {!! Form::text('lokalizacja', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('material_biologiczny_typ_id', 'Typ materiału biologicznego') !!}
            {!! Form::select('material_biologiczny_typ_id', array(1 => 'hodowlany', 2 => 'zamrożony', 3 => 'ultrwalony'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('asortyment_id', 'Asortyment') !!}
            {!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), null, ['class' => 'form-control']) !!}
        </div>

        <div class="col-md-11" , style="margin-bottom: 15px">
            {!! Form::submit('Dodaj', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
        </div>

    </div>




    {!! Form::close() !!}


@stop