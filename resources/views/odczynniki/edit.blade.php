@extends('layouts.master')

@section('content')




	{!! Form::model($odczynnik,['method' => 'patch', 'route' => ['odczynniki.update', $odczynnik->ID]]) !!}

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="page-header" xmlns="http://www.w3.org/1999/html"><h1>Dodaj nowy odczynnik</h1></div>

	{!! Form::open(['route' => 'odczynniki.store']) !!}
	<div class="container col-md-7">

		<div class="form-group col-md-11">
			{!! Form::label('nazwa', 'Nazwa') !!}
			{!! Form::text('nazwa', $odczynnik->nazwa, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-11">
			{!! Form::label('firma', 'Firma') !!}
			{!! Form::text('firma', $odczynnik->firma, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-5">
			{!! Form::label('numer_kat', 'Numer katalogowy') !!}
			{!! Form::text('numer_kat', $odczynnik->numer_kat, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-offset-1 col-md-5">
			{!! Form::label('ilosc', 'Ilość') !!}
			{!! Form::number('ilosc', $odczynnik->ilosc, ['step' => '1', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-5">
			{!! Form::label('jednostka', 'Jednostka') !!}
			{!! Form::select('jednostka', array('ml' => 'ml', 'µl' => 'µl', 'nl' => 'nl', 'g' => 'g', 'mg' => 'mg', 'ug' => 'ug', 'ng' => 'ng'), $odczynnik->jednostka, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-offset-1 col-md-5">
			{!! Form::label('masa_molowa', 'Masa molowa') !!}
			{!! Form::number('masa_molowa', $odczynnik->masa_molowa, ['step' => '1', 'class' => 'form-control' ]) !!}
		</div>

		<div class="form-group col-md-5">
			{!! Form::label('data_waznosci', 'Data ważności') !!}
			{!! Form::date('data_waznosci', $odczynnik->data_waznosci, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-offset-1 col-md-5">
			{!! Form::label('cena_za_szt', 'Cena za sztukę') !!}
			{!! Form::number('cena_za_szt', $odczynnik->cena_za_szt, ['step' => '0.01', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-5">
			{!! Form::label('lokalizacja', 'Lokalizacja') !!}
			{!! Form::text('lokalizacja', $odczynnik->lokalizacja, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-offset-1 col-md-5">
			{!! Form::label('temperatura', 'Temperatura') !!}
			{!! Form::number('temperatura', $odczynnik->temperatura, ['step' => '0.1', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-5">
			{!! Form::label('odczynnik_typ', 'Typ odczynnika') !!}
			{!! Form::select('odczynnik_typ_id', array(1 => 'odczynniki chemiczne', 2 => 'odczynniki biologiczne'), $odczynnik->odczynnik_typ_id, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-offset-1 col-md-5">
			{!! Form::label('asortyment', 'Asortyment') !!}
			{!! Form::select('asortyment_id', array(1 => 'odczynniki', 2 => 'urządzenia'), $odczynnik->asortyment_id, ['class' => 'form-control']) !!}
		</div>

		<div class="col-md-11" style="margin-bottom: 15px">
			{!! Form::submit('Zatwierdź', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
		</div>

	</div>

	{!! Form::close() !!}



@stop