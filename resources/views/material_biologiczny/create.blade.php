@extends('layouts.master')

@section('content')


Dodaj nowy materiał biologiczny




	{!! Form::open(['route' => 'material_biologiczny.store']) !!}
	
	{!! Form::label('rodzaj_komorek', 'Rodzaj komórek') !!}
	{!! Form::text('rodzaj_komorek') !!}
	<br>
	{!! Form::label('rodzaj_tkanki', 'Rodzaj tkanki') !!}
	{!! Form::text('rodzaj_tkanki') !!}
	<br>
	{!! Form::label('firma', 'Firma') !!}
	{!! Form::text('firma') !!}
	<br>
	{!! Form::label('data_dostarczenia', 'Data dostarczenia') !!}
	{!! Form::date('data_dostarczenia', \Carbon\Carbon::now()) !!}
	<br>
	{!! Form::label('data_izolacji', 'Data izolacji') !!}
	{!! Form::date('data_izolacji', \Carbon\Carbon::now()) !!}
	<br>
	{!! Form::label('organizm', 'Organizm') !!}
	{!! Form::text('organizm') !!}
	<br>
	{!! Form::label('data_zamrozenia', 'Data zamrożenia') !!}
	{!! Form::date('data_zamrozenia', \Carbon\Carbon::now()) !!}
	<br>
	{!! Form::label('temperatura_przechowywania', 'Temperatura przechowywania') !!}
	{!! Form::text('temperatura_przechowywania') !!}
	<br>
	{!! Form::label('ilosc_komorek', 'Ilość komórek') !!}
	{!! Form::number('ilosc_komorek', 1, ['min'=>1 ]) !!}
	<br>
	{!! Form::label('stezenie_RNA', 'Stężenie RNA') !!}
	{!! Form::text('stezenie_RNA') !!}
	<br>
	{!! Form::label('stezenie_DNA', 'Stężenie DNA') !!}
	{!! Form::text('stezenie_DNA') !!}
	<br>
	{!! Form::label('objetosc_tkanki', 'Objętość tkanki') !!}
	{!! Form::text('objetosc_tkanki') !!}
	<br>
	{!! Form::label('sposob_utrwalenia', 'Sposób utrwalenia') !!}
	{!! Form::text('sposob_utrwalenia') !!}
	<br>
	{!! Form::label('obserwacje', 'Obserwacje') !!}
	{!! Form::text('obserwacje') !!}
	<br>
	{!! Form::label('rodzaj_probowki', 'Rodzaj próbówki') !!}
	{!! Form::text('rodzaj_probowki') !!}
	<br>
	{!! Form::label('stezenie', 'Stężenie') !!}
	{!! Form::number('stezenie', 1) !!}
	<br>
	{!! Form::label('objetosc_probki', 'Objętość próbki') !!}
	{!! Form::text('objetosc_probki') !!}
	<br>
	{!! Form::label('data_gwarancji', 'Data gwarancji') !!}
	{!! Form::date('data_gwarancji', \Carbon\Carbon::now()) !!}
	<br>
	{!! Form::label('lokalizacja', 'Lokalizacja') !!}
	{!! Form::text('lokalizacja') !!}
	<br>
	{!! Form::label('material_biologiczny_typ_id', 'Typ materiału biologicznego') !!}
	{!! Form::select('material_biologiczny_typ_id', array(1 => 'hodowlany', 2 => 'zamrożony', 3 => 'ultrwalony')) !!}
	<br>
	{!! Form::label('asortyment_id', 'Asortyment') !!}
	{!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia')) !!}
	<br>
	
	{!! Form::submit('Dodaj') !!}
	
	{!! Form::close() !!}


@stop