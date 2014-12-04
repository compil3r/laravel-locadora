@extends('layout')

@section('titulo')
	Login do Usuario
@stop

@section('corpo')
	{{ Form::open(['method'=> 'post', 'route' => 'sessions.store']) }}
	<div>
		{{ Form::label('email', 'E-mail: ') }}
		{{ Form::email('email','', ['class'=>'form-caixa-texto']) }}
	</div>
	<div>
		{{ Form::label('password', 'Senha: ')}}
		{{ Form::password('password', ['class'=>'form-caixa-texto'])}}
	</div>
	<div><br>
		{{ Form::submit('Logar', ['class'=>'botao botao-normal']) }}
	</div>
	{{ Form::close() }}
@stop 