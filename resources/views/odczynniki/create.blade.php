@extends('layouts.master')

@section('content')


Dodaj nowy odczynnik




	{!! Form::open(['route' => 'odczynniki.store']) !!}
	
	{!! Form::label('nazwa', 'Nazwa') !!}
	{!! Form::text('nazwa') !!}
	<br>
	{!! Form::label('firma', 'Firma') !!}
	{!! Form::text('firma') !!}
	<br>
	{!! Form::label('numer_kat', 'Numer katalogowy') !!}
	{!! Form::text('numer_kat') !!}
	<br>
	{!! Form::label('ilosc', 'Ilość') !!}
	{!! Form::number('ilosc', 1, ['min'=>1 ]) !!}
	<br>
	{!! Form::label('jednostka', 'Jednostka') !!}
	{!! Form::select('jednostka', array('ml' => 'ml', 'µl' => 'µl', 'nl' => 'nl', 'g' => 'g', 'mg' => 'mg', 'ug' => 'ug', 'ng' => 'ng')) !!}
	<br>
	{!! Form::label('masa_molowa', 'Masa molowa') !!}
	{!! Form::number('masa_molowa', 1, ['min'=>1 ]) !!}
	<br>
	{!! Form::label('data_waznosci', 'Data ważności') !!}
	{!! Form::date('data_waznosci', \Carbon\Carbon::now()) !!}
	<br>
	{!! Form::label('cena_za_szt', 'Cena za sztukę') !!}
	{!! Form::text('cena_za_szt') !!}
	<br>
	{!! Form::label('lokalizacja', 'Lokalizacja') !!}
	{!! Form::text('lokalizacja') !!}
	<br>
	{!! Form::label('temperatura', 'Temperatura') !!}
	{!! Form::text('temperatura') !!}
	<br>
	{!! Form::label('odczynnik_typ', 'Typ odczynnika') !!}
	{!! Form::select('odczynnik_typ_id', array(1 => 'odczynniki chemiczne', 2 => 'odczynniki biologiczne')) !!}
	<br>
	{!! Form::label('asortyment_id', 'Asortyment') !!}
	{!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia')) !!}
	<br>
	
	{!! Form::submit('Dodaj') !!}
	
	{!! Form::close() !!}


@stop