@extends('layout')
@section('titulo')
	Editar Cliente
@stop
@section('corpo')
{{Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'put'])}}
		<div>

			{{Form::label('nome', 'Nome:')}}
			{{Form::text('nome', $cliente->nome, ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('nome') }}

		</div>
		<div>
			{{Form::label('email', 'E-mail:')}}
			{{Form::text('email', $cliente->email, ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('email') }}
		</div>
		<div>
			{{Form::label('cpf', 'CPF:')}}
			{{Form::text('cpf', $cliente->cpf, ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('cpf') }}
		</div>
		<div>
		<br>
			{{Form::submit('Cadastrar',['class'=>'botao botao-normal'] )}}
		</div>
		{{Form::close()}}
@stop