@extends('app')

@section('content')
<a href="/regiones/create">
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
          <th>Acción</th>
        </tr>
      </thead>

      <tbody>
		@foreach($regiones as $region)
        <tr>
	        <th scope="row">{{ $region->id }}</th>
	    	<td>{{ $region->nombre }}</td>
	        <td>
	          	<a href="/regiones/{{ $region->id }}/edit"><button type="button" class="btn btn-default">
	  				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</button></a>
				<button type="button" class="btn btn-danger">
	  				<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
			</td>
        </tr>
		@endforeach	
      </tbody>
	</table>
</div>
@endsection