@extends('app')

@section('content')
<a href="/estados/create">
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
		@foreach($estados as $estado)
        <tr>
	        <th scope="row">{{ $estado->id }}</th>
	    	<td>{{ $estado->nombre }}</td>
	        <td>
	          	<a href="/estados/{{ $estado->id}}/edit">
	          		<button type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</button>
				</a>
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