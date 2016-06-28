@extends('layouts.master')

@section('content')

	{!! Form::model($notatka,['method' => 'patch', 'route' => ['notatki.update', $notatka->ID]]) !!}

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<div class="page-header" xmlns="http://www.w3.org/1999/html"><h1>Edytuj notatkę</h1></div>

	{!! Form::open(['route' => 'notatki.store']) !!}
	<div class="container">

		<div class="form-group col-md-5">
			{!! Form::label('nazwa', 'Tytuł') !!}
			{!! Form::text('nazwa', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group col-md-11">
			{!! Form::label('opis', 'Treść') !!}
			{!! Form::textarea('opis', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="col-md-5" style="margin-bottom: 15px">
			{!! Form::submit('Zatwierdź', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
		</div>

	</div>

	{!! Form::close() !!}

	
@stop