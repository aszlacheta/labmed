@extends('layouts.master')

@section('content')


Dodaj nowe urządzenie




	{!! Form::open(['route' => 'urzadzenia.store']) !!}
	
	{!! Form::label('nazwa', 'Nazwa') !!}
	{!! Form::text('nazwa') !!}
	<br>
	{!! Form::label('numer_kat', 'Numer katalogowy') !!}
	{!! Form::text('numer_kat') !!}
	<br>
	{!! Form::label('data_zakupu', 'Data zakupu') !!}
	{!! Form::date('data_zakupu', \Carbon\Carbon::now()) !!}
	<br>
	{!! Form::label('data_wymiany_filtr', 'Data wymiany filtra') !!}
	{!! Form::date('data_wymiany_filtr', \Carbon\Carbon::now()) !!}	
	<br>
	{!! Form::label('czas_gwarancji', 'Czas gwarancji') !!}
	{!! Form::date('czas_gwarancji', \Carbon\Carbon::now()) !!}	
	<br>
	{!! Form::label('lokalizacja', 'Lokalizacja') !!}
	{!! Form::text('lokalizacja') !!}
	<br>
	{!! Form::label('urzadzenie_typ_id', 'Typ urządzenia') !!}
	{!! Form::select('urzadzenie_typ_id', array(1 => 'komory laminarne', 2 => 'urządzenia pomiarowe', 3 => 'drobny sprzęt labolatoryjny', 4 => 'wirówki', 5 => 'worteksy', 6 => 'mieszadła', 7 => 'pipetory')) !!}
	<br>
	{!! Form::label('asortyment_id', 'Asortyment') !!}
	{!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia')) !!}
	<br>
	{!! Form::label('ilosc', 'Ilość') !!}
	{!! Form::number('ilosc', 1, ['min'=>1 ]) !!}
	<br>
	
	{!! Form::submit('Dodaj') !!}
	
	{!! Form::close() !!}


@stop