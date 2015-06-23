@extends('app')

@section('content')
<a href="/restaurantes/create">
	<button type="button" class="btn btn-primary" aria-label="Left Align">
		<span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span>
	</button>
</a>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
        <tr>
          <th>id</th>
          <th>Nombre</th>
          <!--<th>Región</th>
          <th>Estado</th>
          <th>Ciudad</th>-->
          <th>Acción</th>
        </tr>
      </thead>

      <tbody>
		@foreach($restaurantes as $restaurante)
        <tr>
	        <th scope="row">{{ $restaurante->id }}</th>
	    	<td>{{ $restaurante->nombre }}</td>
	    	<!--<td></td>
	    	<td></td>
	    	<td></td>-->
	        <td>
	          	<a href="/restaurantes/{{ $restaurante->id }}/edit"><button type="button" class="btn btn-default">
	  				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</button></a>
				{!! Form::open(array('route' => array('restaurantes.destroy', $restaurante->id), 'method' => 'delete' )) !!}
				<button type="submit" class="btn btn-danger">
	  				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				{!! Form::close() !!}
			</td>
        </tr>
		@endforeach	
      </tbody>
	</table>
</div>
@endsection