@extends('layout')

@section('titulo')
	Cadastrar Funcionarios
@stop

@section('corpo')
	{{Form::open(['route' => 'funcionarios.store', 'method' => 'post', 'class'=>'form'])}}
		<div>

			{{Form::label('nome', 'Nome:')}}
			{{Form::text('nome', '', ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('nome') }}

		</div>
		<div>
			{{Form::label('email', 'E-mail:')}}
			{{Form::text('email', '', ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('email') }}
		</div>
		<div>
			{{Form::label('password', 'Senha:')}}
			{{Form::password('password', ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('password') }}
		</div>
		<div>
		<br>
			{{Form::submit('Cadastrar',['class'=>'botao botao-normal'] )}}
		</div>
		{{Form::close()}}
@stop