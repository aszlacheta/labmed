@extends('layouts.master')

@section('content')




{!! Form::model($sprzet,['method' => 'patch', 'route' => ['sprzet_jednorazowy.update', $sprzet->ID]]) !!}


	{!! Form::label('nazwa', 'Nazwa') !!}
	{!! Form::text('nazwa', $sprzet->nazwa) !!}
	<br>
	{!! Form::label('firma', 'Firma') !!}
	{!! Form::text('firma', $sprzet->firma) !!}
	<br>
	{!! Form::label('numer_kat', 'Numer katalogowy') !!}
	{!! Form::text('numer_kat', $sprzet->numer_kat) !!}
	<br>
	{!! Form::label('pojemnosc', 'Pojemność') !!}
	{!! Form::number('pojemnosc', $sprzet->pojemnosc, ['min'=>1 ]) !!}
	<br>
	{!! Form::label('kalibracja', 'Kalibracja') !!}
	{!! Form::number('kalibracja', $sprzet->kalibracja) !!}
	<br>
	{!! Form::label('data_naprawy', 'Data naprawy') !!}
	{!! Form::date('data_naprawy', $sprzet->data_naprawy) !!}
	<br>
	{!! Form::label('opis_naprawy', 'Opis naprawy') !!}
	{!! Form::text('opis_naprawy', $sprzet->opis_naprawy) !!}
	<br>
	{!! Form::label('data_zakupu', 'Data zakupu') !!}
	{!! Form::date('data_zakupu', $sprzet->data_zakupu) !!}
	<br>
	{!! Form::label('data_wymiany_filtr', 'Data wymiany filtra') !!}
	{!! Form::date('data_wymiany_filtr', $sprzet->data_wymiany_filtr) !!}
	<br>
	{!! Form::label('czas_gwarancji', 'Czas gwarancji') !!}
	{!! Form::date('czas_gwarancji', $sprzet->czas_gwarancji) !!}
	<br>
	{!! Form::label('lokalizacja', 'Lokalizacja') !!}
	{!! Form::text('lokalizacja', $sprzet->lokalizacja) !!}
	<br>
	{!! Form::label('sprzet_jedn_typ_id', 'Typ sprzętu jednorazowego') !!}
	{!! Form::select('sprzet_jedn_typ_id', array(1 => 'piepty', 2 => 'końcówki do pipet', 3 => 'butelki hodowlane', 4 => 'płytki wielodołkowe', 5 => 'szalki', 6 => 'probówki'), $sprzet->sprzet_jedn_typ_id) !!}
	<br>
	{!! Form::label('sprzet_jedn_podtyp_id', 'Podtyp sprzętu jednorazowego')!!} 
	{!! Form::select('sprzet_jedn_podtyp_id', array(1 => 'automatyczne 0,2-2 µl', 2=> 'automatyczne 0,5-10 µl', 3 => 'automatyczne 10-50 µl',
	 4 => 'automatyczne 20-200 µl', 5 => 'automatyczne 100-1000 µl', 6 => 'automatyczne wielokanałowe', 7 => 'serologiczne 1 ml',
	 8 => 'serologiczne 2 ml', 9 => 'serologiczne 5 ml', 10 => 'serologiczne 10 ml', 11 => 'serologiczne 25 ml', 12 => 'serologiczne 50 ml',
	  13 => 'jednomiarowe', 14 => 'Pasteura', 15 => 'do 20 µl', 16 => 'do 200 µl', 17 => 'do 1000 µl',
	  18 => '25 cm2', 19 => '75 cm2', 20 => '225 cm2', 21 => '6-dołkowe', 22 => '12-dołkowe', 23 => '24-dołkowe', 24 => '48-dołkowe', 
	  25 => '96-dołkowe', 26 => '384-dołkowe', 27 => '1536-dołkowe', 28 => '35mm',
	  29 => '60mm', 30 => '100mm', 31 => '150mm', 32 => 'Eppendorf 200 µl', 33 => 'Eppendorf 1,5 ml', 34 => 'Eppendorf 2 ml', 35 => 'flakony 15 ml', 
	  36 => 'flakony 50 ml', 37 => 'z zamknięciem dwupozycyjnym 5 ml', 38 => 'z zamknięciem dwupozycyjnym 13 ml', 39 => 'do zamrażania'), $sprzet->sprzet_jedn_podtyp_id) !!}
	<br>
	{!! Form::label('asortyment_id', 'Asortyment') !!}
	{!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), $sprzet->asortyment_id) !!}
	<br>
	{!! Form::label('ilosc', 'Ilość') !!}
	{!! Form::number('ilosc', $sprzet->ilosc, ['min'=>1 ]) !!}
	<br>
	{!! Form::label('cena_za_szt', 'Cena za sztukę') !!}
	{!! Form::text('cena_za_szt', $sprzet->cena_za_szt) !!}
	<br>


{!! Form::submit('Edit') !!}


{!! Form::close() !!}



@stop