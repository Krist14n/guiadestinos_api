@extends('app')

@section('content')
<div class="col-md-4">
	<h4>Editar Hotel</h4>

	{!! Form::model('hotel', ['route' => ['hoteles.update', $hotel->id], 'method' => 'PATCH']) !!}

		<div class="form-group">
			<label for="ciudad">Ciudad</label>
			<select class="form-control ciudad_selector" name="ciudad_id" id="ciudad">
				  	@foreach( $ciudades as $ciudad)
				  	<option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
				  	@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="nombre">Nombre</label>
			{!! Form::text('nombre', $hotel->nombre, ['class'=> 'form-control', 'id' => 'nombre', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			{!! Form::hidden('categoria_id', '1') !!}
		</div>

		<div class="form-group">
			<label for="descripcion">Descripción</label>
			{!! Form::textarea('descripcion', $hotel->descripcion, ['class'=> 'form-control', 'id' => 'descripcion', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="direccion">Dirección</label>
			{!! Form::textarea('direccion', $direccion->direccion, ['class'=> 'form-control', 'id' => 'direccion', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="latitud">Latitud</label>
			{!! Form::text('latitud', $direccion->latitud, ['class'=> 'form-control', 'id' => 'latitud', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="longitud">Longitud</label>
			{!! Form::text('longitud', $direccion->longitud, ['class'=> 'form-control', 'id' => 'longitud', 'required' => 'required']) !!}

		</div>
		<div class="form-group">
			<label for="telefono">Teléfono(s) *separados por coma</label>
			{!! Form::textarea('telefono', $direccion->telefono, ['class'=> 'form-control', 'id' => 'telefono']) !!}

		</div>
		<div class="form-group">
			<label for="web">Pagina Web</label>
			{!! Form::text('web', $hotel->web, ['class'=> 'form-control', 'id' => 'web']) !!}

		</div>
		<div class="form-group">
			<label for="promocion">Promoción *dejar vacio si no aplica</label>
			{!! Form::text('promocion', $hotel->promocion, ['class'=> 'form-control', 'id' => 'promocion']) !!}

		</div>
		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary  ']) !!}

		</div>
	
	{!! Form::close() !!}
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#ciudad").val("{{ $hotel->ciudad_id}}");
})
</script>
@endsection