@extends('layouts.admin')
	@include('layouts.message')
	@section('content')
	<div class="users">
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Operación</th>
			</thead>
			@foreach($users as $user)
			<tbody>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'])!!}  </td><td>
				{!!Form::open(['route'=>['usuario.destroy',$user],'method'=>'DELETE'])!!}
					<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">Eliminar</button>
				{!!Form::close()!!}</td>
			</tbody>
			@endforeach
		</table>
		{!!$users->render()!!}
	</div>
	@stop

	@section('scripts')
		{!!Html::script('js/script3.js')!!}
	@stop