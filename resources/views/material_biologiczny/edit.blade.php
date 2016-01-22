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

    <div class="page-header"><h1>Wprowadź zmiany dla materiału biologicznego</h1></div>

    {!! Form::model($materialBiologiczny,['method' => 'patch', 'route' => ['material_biologiczny.update', $materialBiologiczny->ID]]) !!}

    <div class="container col-md-7">

        <div class="form-group col-md-5">
            {!! Form::label('rodzaj_komorek', 'Rodzaj komórek') !!}
            {!! Form::text('rodzaj_komorek', $materialBiologiczny->rodzaj_komorek, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('rodzaj_tkanki', 'Rodzaj tkanki') !!}
            {!! Form::text('rodzaj_tkanki', $materialBiologiczny->rodzaj_tkanki, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('firma', 'Firma') !!}
            {!! Form::text('firma', $materialBiologiczny->firma, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('data_dostarczenia', 'Data dostarczenia') !!}
            {!! Form::date('data_dostarczenia', $materialBiologiczny->data_dostarczenia, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('data_izolacji', 'Data izolacji') !!}
            {!! Form::date('data_izolacji', $materialBiologiczny->data_izolacji, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('organizm', 'Organizm') !!}
            {!! Form::text('organizm', $materialBiologiczny->organizm, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('data_zamrozenia', 'Data zamrożenia') !!}
            {!! Form::date('data_zamrozenia', $materialBiologiczny->data_zamrozenia, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('temperatura_przechowywania', 'Temperatura przechowywania') !!}
            {!! Form::number('temperatura_przechowywania', number_format($materialBiologiczny->temperatura_przechowywania, 2), ['step' => '0.1', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('ilosc_komorek', 'Ilość komórek') !!}
            {!! Form::number('ilosc_komorek', $materialBiologiczny->ilosc_komorek, ['min'=>1, 'class' => 'form-control' ]) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('stezenie_RNA', 'Stężenie RNA') !!}
            {!! Form::number('stezenie_RNA', number_format($materialBiologiczny->stezenie_RNA, 2), ['step' => '0.01', 'min' => '0', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('stezenie_DNA', 'Stężenie DNA') !!}
            {!! Form::number('stezenie_DNA', number_format($materialBiologiczny->stezenie_DNA, 2), ['step' => '0.01', 'min' => '0', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('objetosc_tkanki', 'Objętość tkanki') !!}
            {!! Form::number('objetosc_tkanki', number_format($materialBiologiczny->objetosc_tkanki, 2), ['class' => 'form-control', 'step' => '0.01', 'min' => '0']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('sposob_utrwalenia', 'Sposób utrwalenia') !!}
            {!! Form::textarea('sposob_utrwalenia', $materialBiologiczny->sposob_utrwalenia, ['class' => 'form-control', 'rows' => '8']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('obserwacje', 'Obserwacje') !!}
            {!! Form::textarea('obserwacje', $materialBiologiczny->obserwacje, ['class' => 'form-control', 'rows' => '8']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('rodzaj_probowki', 'Rodzaj próbówki') !!}
            {!! Form::text('rodzaj_probowki', $materialBiologiczny->rodzaj_probowki, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('stezenie', 'Stężenie') !!}
            {!! Form::number('stezenie', $materialBiologiczny->stezenie, ['step' => '1', 'min' => '0', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('objetosc_probki', 'Objętość próbki') !!}
            {!! Form::number('objetosc_probki', number_format($materialBiologiczny->objetosc_probki, 2), ['step' => '0.01', 'min' => '0', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('data_gwarancji', 'Data gwarancji') !!}
            {!! Form::date('data_gwarancji', $materialBiologiczny->data_gwarancji, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('lokalizacja', 'Lokalizacja') !!}
            {!! Form::text('lokalizacja', $materialBiologiczny->lokalizacja, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-offset-1 col-md-5">
            {!! Form::label('material_biologiczny_typ_id', 'Typ materiału biologicznego') !!}
            {!! Form::select('material_biologiczny_typ_id', array(1 => 'hodowlany', 2 => 'zamrożony', 3 => 'ultrwalony'), $materialBiologiczny->material_biologiczny_typ, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-5">
            {!! Form::label('asortyment_id', 'Asortyment') !!}
            {!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), $materialBiologiczny->asortyment_id, ['class' => 'form-control']) !!}
        </div>

        <div class="col-md-11" , style="margin-bottom: 15px">
            {!! Form::submit('Zatwierdź', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
        </div>

    </div>


    {!! Form::close() !!}



@stop