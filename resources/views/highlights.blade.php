@extends('app')

@section('content')
<a href="/highlights/create">
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
		@foreach($highlights as $highlight)
        <tr>
	        <th scope="row">{{ $highlight->id }}</th>
	    	<td>{{ $highlight->nombre }}</td>
	        <td>
	          	<a href="/highlights/{{ $highlight->id}}/edit">
	          		<button type="button" class="btn btn-default">
	  					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</button>
				</a>
				{!! Form::open(array('route' => array('highlights.destroy', $highlight->id), 'method' => 'delete' )) !!}
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