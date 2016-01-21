@extends('layouts.master')

@section('content')




{!! Form::model($urzadzenie,['method' => 'patch', 'route' => ['urzadzenia.update', $urzadzenie->ID]]) !!}

	
	{!! Form::label('nazwa', 'Nazwa') !!}
	{!! Form::text('nazwa', $urzadzenie->nazwa) !!}
	<br>
	{!! Form::label('numer_kat', 'Numer katalogowy') !!}
	{!! Form::text('numer_kat', $urzadzenie->numer_kat) !!}
	<br>
	{!! Form::label('data_zakupu', 'Data zakupu') !!}
	{!! Form::date('data_zakupu', $urzadzenie->data_zakupu) !!}
	<br>
	{!! Form::label('data_wymiany_filtr', 'Data wymiany filtra') !!}
	{!! Form::date('data_wymiany_filtr', $urzadzenie->data_wymiany_filtr) !!}	
	<br>
	{!! Form::label('czas_gwarancji', 'Czas gwarancji') !!}
	{!! Form::date('czas_gwarancji', $urzadzenie->czas_gwarancji) !!}	
	<br>
	{!! Form::label('lokalizacja', 'Lokalizacja') !!}
	{!! Form::text('lokalizacja', $urzadzenie->lokalizacja) !!}
	<br>
	{!! Form::label('urzadzenie_typ_id', 'Typ urządzenia') !!}
	{!! Form::select('urzadzenie_typ_id', array(1 => 'komory laminarne', 2 => 'urządzenia pomiarowe', 3 => 'drobny sprzęt labolatoryjny', 4 => 'wirówki', 5 => 'worteksy', 6 => 'mieszadła', 7 => 'pipetory'), $urzadzenie->urzadzenie_typ_id) !!}
	<br>
	{!! Form::label('asortyment', 'Asortyment') !!}
	{!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), $urzadzenie->asortyment_id) !!}
	<br>
	{!! Form::label('ilosc', 'Ilość') !!}
	{!! Form::number('ilosc', $urzadzenie->ilosc, ['min'=>1 ]) !!}
	<br>
	


{!! Form::submit('Edit') !!}


{!! Form::close() !!}



@stop