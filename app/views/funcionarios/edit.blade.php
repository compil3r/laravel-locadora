 @extends('layout')

@section('titulo')
	Editar Funcionários
@stop

@section('corpo')

	{{Form::model($user, ['route' => ['funcionarios.update', $user->id], 'method' => 'put'])}}
		<div>
			{{Form::label('nome', 'Nome:')}}
			{{Form::text('nome', $user->nome, ['class' => 'form-caixa-texto'])}}
			{{ $errors->first('nome') }}

		</div>
		<div>
			{{Form::label('email', 'E-mail:')}}
			{{Form::text('email', $user->email, ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('email') }}
		</div>
		<div>
			{{Form::label('password', 'Senha:')}}
			{{Form::password('password',['class'=>'form-caixa-texto'])}}
			{{ $errors->first('senha') }}
		</div>
		<div>
		<br>
			{{Form::submit('Cadastrar',['class'=>'botao botao-normal'] )}}
		</div>
		{{Form::close()}}
@stop