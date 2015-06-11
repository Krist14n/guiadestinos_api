@extends('app')

@section('content')
<div class="col-md-4">
	<h4>Editar: {{ $region->nombre }}</h4>

	{!! Form::model($region, ['route' => ['regiones.update', $region->id ] , 'method' => 'PATCH']) !!}

		<div class="form-group">

			{!! Form::text('nombre', null, ['class'=> 'form-control']) !!}

		</div>

		<div class="form-group">

			{!! Form::submit('Editar', ['class' => 'btn btn-primary  ']) !!}

		</div>
	
	{!! Form::close() !!}
</div>
@endsection