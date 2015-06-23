@extends('app')

@section('content')
<div class="col-md-4">
	<h4>Agregar Highlight</h4>

	{!! Form::open(['route' => 'highlights.store', 'files' => 'true']) !!}

		<div class="form-group">
			<label for="estado">Estado</label>
			<select class="form-control" name="estado_id" id="estado">
				  	@foreach( $estados as $estado)
				  	<option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
				  	@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="ciudad">Ciudad</label>
			<select class="form-control" name="ciudad_id" id="ciudad">
				  	@foreach( $ciudades as $ciudad)
				  	<option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
				  	@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="nombre">Nombre de highlight</label>
			{!! Form::text('nombre', null, ['class'=> 'form-control', 'id' => 'nombre']) !!}

		</div>
		<div class="form-group">
			{!! Form::hidden('categoria_id', '4') !!}
		</div>

		<div class="form-group">
			<label for="highlights">Highlights separados por punto y coma ;</label>
			{!! Form::textarea('highlights', null, ['class'=> 'form-control', 'id' => 'highlights']) !!}

		</div>

		<div class="form-group">
			<label for="descripcion">Descripción del Estado </label>
			{!! Form::textarea('descripcion', null, ['class'=> 'form-control', 'id' => 'descripcion']) !!}

		</div>


		<div class="form-group">
			<label for="foto">Foto</label>
			{!! Form::file('foto', null, ['class'=> 'form-control', 'id' => 'foto']) !!}

		</div>

		<!--<div class="form-group">
			<label for="latitud">Latitud</label>
			{!! Form::text('latitud', null, ['class'=> 'form-control', 'id' => 'latitud']) !!}

		</div>
		<div class="form-group">
			<label for="longitud">Longitud</label>
			{!! Form::text('longitud', null, ['class'=> 'form-control', 'id' => 'longitud']) !!}

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

		</div>-->

		<div class="form-group">
			{!! Form::submit('Agregar', ['class' => 'btn btn-primary  ']) !!}

		</div>
	
	{!! Form::close() !!}
</div>
@endsection