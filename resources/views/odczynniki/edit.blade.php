@extends('layouts.master')

@section('content')




{!! Form::model($odczynnik,['method' => 'patch', 'route' => ['odczynniki.update', $odczynnik->ID]]) !!}


	{!! Form::label('nazwa', 'Nazwa') !!}
	{!! Form::text('nazwa', $odczynnik->nazwa) !!}
	<br>
	{!! Form::label('firma', 'Firma') !!}
	{!! Form::text('firma', $odczynnik->firma) !!}
	<br>
	{!! Form::label('numer_kat', 'Numer katalogowy') !!}
	{!! Form::text('numer_kat', $odczynnik->numer_kat) !!}
	<br>
	{!! Form::label('ilosc', 'Ilość') !!}
	{!! Form::number('ilosc', $odczynnik->ilosc, ['min'=>1 ]) !!}
	<br>
	{!! Form::label('jednostka', 'Jednostka') !!}
	{!! Form::select('jednostka', array('ml' => 'ml', 'µl' => 'µl', 'nl' => 'nl', 'g' => 'g', 'mg' => 'mg', 'ug' => 'ug', 'ng' => 'ng'),$odczynnik->jednostka) !!}
	<br>
	{!! Form::label('masa_molowa', 'Masa molowa') !!}
	{!! Form::number('masa_molowa', $odczynnik->masa_molowa, ['min'=>1 ]) !!}
	<br>
	{!! Form::label('data_waznosci', 'Data ważności') !!}
	{!! Form::date('data_waznosci', $odczynnik->data_waznosci) !!}
	<br>
	{!! Form::label('cena_za_szt', 'Cena za sztukę') !!}
	{!! Form::text('cena_za_szt', $odczynnik->cena_za_szt)  !!}
	<br>
	{!! Form::label('lokalizacja', 'Lokalizacja') !!}
	{!! Form::text('lokalizacja', $odczynnik->lokalizacja) !!}
	<br>
	{!! Form::label('temperatura', 'Temperatura') !!}
	{!! Form::text('temperatura', $odczynnik->temperatura) !!}
	<br>
	{!! Form::label('odczynnik_typ', 'Typ odczynnika') !!}
	{!! Form::select('odczynnik_typ_id', array(1 => 'odczynniki chemiczne', 2 => 'odczynniki biologiczne'), $odczynnik->odczynnik_typ_id) !!}
	<br>
	{!! Form::label('asortyment_id', 'Asortyment') !!}
	{!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), $odczynnik->asortyment_id) !!}
	<br>


{!! Form::submit('Edit') !!}


{!! Form::close() !!}



@stop