@extends('layouts.master')

@section('content')




{!! Form::model($materialBiologiczny,['method' => 'patch', 'route' => ['material_biologiczny.update', $materialBiologiczny->ID]]) !!}

{!! Form::label('rodzaj_komorek', 'Rodzaj komórek') !!}
	{!! Form::text('rodzaj_komorek', $materialBiologiczny->rodzaj_komorek) !!}
	<br>
	{!! Form::label('rodzaj_tkanki', 'Rodzaj tkanki') !!}
	{!! Form::text('rodzaj_tkanki', $materialBiologiczny->rodzaj_tkanki) !!}
	<br>
	{!! Form::label('firma', 'Firma') !!}
	{!! Form::text('firma', $materialBiologiczny->firma) !!}
	<br>
	{!! Form::label('data_dostarczenia', 'Data dostarczenia') !!}
	{!! Form::date('data_dostarczenia', $materialBiologiczny->data_dostarczenia) !!}
	<br>
	{!! Form::label('data_izolacji', 'Data izolacji') !!}
	{!! Form::date('data_izolacji', $materialBiologiczny->data_izolacji) !!}
	<br>
	{!! Form::label('organizm', 'Organizm') !!}
	{!! Form::text('organizm', $materialBiologiczny->organizm) !!}
	<br>
	{!! Form::label('data_zamrozenia', 'Data zamrożenia') !!}
	{!! Form::date('data_zamrozenia', $materialBiologiczny->data_zamrozenia) !!}
	<br>
	{!! Form::label('temperatura_przechowywania', 'Temperatura przechowywania') !!}
	{!! Form::text('temperatura_przechowywania', $materialBiologiczny->temperatura_przechowywania) !!}
	<br>
	{!! Form::label('ilosc_komorek', 'Ilość komórek') !!}
	{!! Form::number('ilosc_komorek', $materialBiologiczny->ilosc_komorek, ['min'=>1 ]) !!}
	<br>
	{!! Form::label('stezenie_RNA', 'Stężenie RNA') !!}
	{!! Form::text('stezenie_RNA', $materialBiologiczny->stezenie_RNA) !!}
	<br>
	{!! Form::label('stezenie_DNA', 'Stężenie DNA') !!}
	{!! Form::text('stezenie_DNA', $materialBiologiczny->stezenie_DNA) !!}
	<br>
	{!! Form::label('objetosc_tkanki', 'Objętość tkanki') !!}
	{!! Form::text('objetosc_tkanki', $materialBiologiczny->objetosc_tkanki) !!}
	<br>
	{!! Form::label('sposob_utrwalenia', 'Sposób utrwalenia') !!}
	{!! Form::text('sposob_utrwalenia', $materialBiologiczny->sposob_utrwalenia) !!}
	<br>
	{!! Form::label('obserwacje', 'Obserwacje') !!}
	{!! Form::text('obserwacje', $materialBiologiczny->obserwacje) !!}
	<br>
	{!! Form::label('rodzaj_probowki', 'Rodzaj próbówki') !!}
	{!! Form::text('rodzaj_probowki', $materialBiologiczny->rodzaj_probowki) !!}
	<br>
	{!! Form::label('stezenie', 'Stężenie') !!}
	{!! Form::number('stezenie', $materialBiologiczny->stezenie) !!}
	<br>
	{!! Form::label('objetosc_probki', 'Objętość próbki') !!}
	{!! Form::text('objetosc_probki', $materialBiologiczny->objetosc_probki) !!}
	<br>
	{!! Form::label('data_gwarancji', 'Data gwarancji') !!}
	{!! Form::date('data_gwarancji', $materialBiologiczny->data_gwarancji) !!}
	<br>
	{!! Form::label('lokalizacja', 'Lokalizacja') !!}
	{!! Form::text('lokalizacja', $materialBiologiczny->lokalizacja) !!}
	<br>
	{!! Form::label('material_biologiczny_typ_id', 'Typ materiału biologicznego') !!}
	{!! Form::select('material_biologiczny_typ_id', array(1 => 'hodowlany', 2 => 'zamrożony', 3 => 'ultrwalony'), $materialBiologiczny->material_biologiczny_typ_id) !!}
	<br>
	{!! Form::label('asortyment_id', 'Asortyment') !!}
	{!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), $materialBiologiczny->asortyment_id) !!}
	<br>



{!! Form::submit('Edit') !!}


{!! Form::close() !!}



@stop