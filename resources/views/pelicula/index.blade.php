@extends('layouts.admin')
	@include('layouts.message')
	@section('content')
		<table class="table">
			<thead>
				<th>Nombre</th>	
				<th>Género</th>	
				<th>Dirección</th>	
				<th>Poster</th>	
				<th>Operación</th>	
			</thead>
			@foreach($movies as $movie)
				<tbody>
					<td>{{$movie->name}}</td>
					<td>{{$movie->genre}}</td>
					<td>{{$movie->direction}}</td>
					<td>
						<img src="{{ asset('movies/'.$movie->path) }}"  style="width:100px">
					</td>
					<td>{!!link_to_route('pelicula.edit', $title = 'Editar', $parameters = $movie->id, $attributes = ['class'=>'btn btn-primary'])!!}  </td>
					<td>
					{!!Form::open(['route'=>['pelicula.destroy',$movie->id],'method'=>'DELETE'])!!}
					<button type="submit" onClick="return confirm('Eliminar registro?')" class="btn btn-danger">Eliminar</button>
					{!!Form::close()!!}
					</td>
				</tbody>
			@endforeach
		</table>
	@endsection


	