@extends('app')

@section('content')
<div class="col-md-4">
	<h4>Agregar Región</h4>

	{!! Form::open(['route' => 'regiones.store']) !!}

		<div class="form-group">

			{!! Form::text('nombre', null, ['class'=> 'form-control']) !!}

		</div>

		<div class="form-group">

			{!! Form::submit('Agregar', ['class' => 'btn btn-primary  ']) !!}

		</div>
	
	{!! Form::close() !!}
	 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
</div>
@endsection