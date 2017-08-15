@extends('layouts.admin')
@section('content')
@include('layouts.errores')
	{!!Form::model($user,['route'=>['usuario.update',$user->id],'method'=>'PUT'])!!}
		@include('usuario.forms.usr')
	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}
@stop