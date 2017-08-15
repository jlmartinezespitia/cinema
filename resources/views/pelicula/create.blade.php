@extends('layouts.admin')
	@section('content')
		@include('layouts.message')
			{!!Form::open(['route'=>'pelicula.store','method'=>'POST','files'=>true])!!}
				@include('pelicula.forms.pelicula')
				{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
			{!!Form::close()!!}
	@endsection