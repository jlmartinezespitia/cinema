@extends('layouts.admin')
	@section('content')
	@include('genero.modal')
		
		<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
				<strong>Género actualizado correctamente</strong>
			</div>

		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Operaciones</th>
			</thead>
			<tbody id="datos"></tbody>
		</table>
	@stop

	@section('scripts')
		<script src="{{asset('js/script2.js')}}"></script>
	@stop