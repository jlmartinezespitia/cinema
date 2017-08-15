@extends('layouts.admin')
@section('content')
@include('layouts.errores')
	{!!Form::model($movie,['route'=>['pelicula.update',$movie],'method'=>'PUT','files'=>true])!!}
		@include('pelicula.forms.pelicula')
	{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
@stop