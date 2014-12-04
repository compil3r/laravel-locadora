@extends('layout')
@section('titulo')
	Cadastrar Cliente
@stop

@section('corpo')
	{{Form::open(['route' => 'clientes.store', 'method' => 'post', 'class'=>'form'])}}
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
			{{Form::label('cpf', 'CPF:')}}
			{{Form::text('cpf', '', ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('cpf') }}
		</div>
		<div>
		<br>
			{{Form::submit('Cadastrar',['class'=>'botao botao-normal'] )}}
		</div>
		{{Form::close()}}
@stop