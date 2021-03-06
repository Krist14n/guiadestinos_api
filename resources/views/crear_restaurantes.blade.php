@extends('app')

@section('content')
<div class="col-md-4">
	<h4>Agregar Restaurante</h4>

	{!! Form::open(['route' => 'restaurantes.store']) !!}

		<div class="form-group">
			<label for="ciudad">Ciudad</label>
			<select class="form-control" name="ciudad_id" id="ciudad">
				  	@foreach( $ciudades as $ciudad)
				  	<option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
				  	@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="nombre">Nombre</label>
			{!! Form::text('nombre', null, ['class'=> 'form-control', 'id' => 'nombre', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="tipo-comida">Tipo de Comida</label>
			{!! Form::text('tipo_comida', null, ['class'=> 'form-control', 'id' => 'tipo-comida', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			{!! Form::hidden('categoria_id', '2') !!}
		</div>

		<div class="form-group">
			<label for="descripcion">Descripción</label>
			{!! Form::textarea('descripcion', null, ['class'=> 'form-control', 'id' => 'descripcion', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="recomendacion">Recomendación MB</label>
			{!! Form::textarea('recomendacion', null, ['class'=> 'form-control', 'id' => 'recomendacion', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="direccion">Dirección</label>
			{!! Form::textarea('direccion', null, ['class'=> 'form-control', 'id' => 'direccion', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="latitud">Latitud</label>
			{!! Form::text('latitud', null, ['class'=> 'form-control', 'id' => 'latitud', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="longitud">Longitud</label>
			{!! Form::text('longitud', null, ['class'=> 'form-control', 'id' => 'longitud', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="telefono">Teléfono(s) *separados por coma</label>
			{!! Form::textarea('telefono', null, ['class'=> 'form-control', 'id' => 'telefono']) !!}

		</div>
		<div class="form-group">
			<label for="web">Pagina Web</label>
			{!! Form::text('web', null, ['class'=> 'form-control', 'id' => 'web']) !!}

		</div>
		<div class="form-group">
			<label for="promocion">Promoción *dejar vacio si no aplica</label>
			{!! Form::text('promocion', null, ['class'=> 'form-control', 'id' => 'promocion']) !!}

		</div>
		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary  ']) !!}

		</div>
	
	{!! Form::close() !!}
</div>
@endsection