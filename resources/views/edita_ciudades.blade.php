@extends('app')

@section('content')
<div class="col-md-4">
	<h4>Editar: {{ $ciudad->nombre }}</h4>

	{!! Form::model($ciudad, ['route' => ['ciudades.update', $ciudad->id] , 'method' => 'PATCH']) !!}

		<div class="form-group">

			{!! Form::text('nombre', null, ['class'=> 'form-control','required' => 'required']) !!}

		</div>

		<div class="form-group">

			{!! Form::submit('Editar', ['class' => 'btn btn-primary  ']) !!}

		</div>
	
	{!! Form::close() !!}
</div>
@endsection