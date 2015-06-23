@extends('app')

@section('content')
<div class="col-md-4">
	<h4>Editar Highlight</h4>

	{!! Form::model('highlight', ['route' => ['highlights.update', $highlight->id],'method' => 'PATCH' , 'files' => 'true']) !!}

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
			{!! Form::text('nombre', $highlight->nombre, ['class'=> 'form-control', 'id' => 'nombre']) !!}

		</div>
		<div class="form-group">
			{!! Form::hidden('categoria_id', '4') !!}
		</div>

		<div class="form-group">
			<label for="highlights">Highlights separados por punto y coma ;</label>
			{!! Form::textarea('highlights', $highlight->lista_highlights, ['class'=> 'form-control', 'id' => 'highlights']) !!}

		</div>

		<div class="form-group">
			<label for="descripcion">Descripción del Estado </label>
			{!! Form::textarea('descripcion', $highlight->descripcion, ['class'=> 'form-control', 'id' => 'descripcion']) !!}

		</div>


		<div class="form-group">
			<label for="foto">Foto Anterior: <b>{{ $highlight->foto }}</b></label>
			{!! Form::file('foto', ['class'=> 'form-control', 'id' => 'foto']) !!}

		</div>

		<div class="form-group">
			{!! Form::submit('Editar', ['class' => 'btn btn-primary  ']) !!}

		</div>
	
	{!! Form::close() !!}
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#estado").val("{{ $highlight->estado_id }}");
	$("#ciudad").val("{{ $highlight->ciudad_id }}");
})
</script>
@endsection