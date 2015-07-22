@extends('app')

@section('content')
<a href="/hoteles/create">
	<button type="button" class="btn btn-primary" aria-label="Left Align">
		<span class="glyphicon glyphicon-plus" aria-hidden="true">Agregar</span>
	</button>
</a>
<div class="table-responsive">
	<table class="table table-striped" id="table_id">
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
		@foreach($hoteles as $hotel)
        <tr>
	        <th scope="row">{{ $hotel->id }}</th>
	    	<td>{{ $hotel->nombre }}</td>
	    	<!--<td></td>
	    	<td></td>
	    	<td></td>-->
	        <td>
	          	<a href="/hoteles/{{ $hotel->id }}/edit"><button type="button" class="btn btn-default">
	  				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</button></a>
				{!! Form::open(array('route' => array('hoteles.destroy', $hotel->id), 'method' => 'delete' )) !!}
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