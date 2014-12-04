@extends('layout')
@section('titulo')
	Cadastrar Filme
@stop
@section('corpo')
{{Form::open(['route' => 'filmes.store', 'method' => 'post', 'files' => true, 'class'=>'form'])}}
		<div>

			{{Form::label('nome', 'Nome:')}}
			{{Form::text('nome', '', ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('nome') }}

		</div>
		<div>
			{{Form::label('sinopse', 'Sinopse:')}}
			{{Form::textarea('sinopse','', ['class'=>'form-caixa-texto', 'style'=>'height:100px;'])}}
			{{ $errors->first('sinopse')}}
		</div>
		<div>
			{{Form:: label('lancamento', 'Lançamento:')}}
			{{Form::input('date', 'lancamento', '', ['class'=>'form-caixa-texto'])}}
			{{$errors->first('data')}}
		</div>
		<div>
			{{Form:: label('classificacao', 'Classificação:')}}
			{{Form::input('number', 'classifciacao', '', ['class'=>'form-caixa-texto'])}}
			{{$errors->first('classificacao')}}
		</div>
		<div>
			{{Form::label('categoria', 'Categoria:')}}
			{{ Form::select('categoria', $categoria, null, ['class'=>'form-caixa-texto']) }}
			{{$errors->first('categoria')}}
			
		</div>
		<div>
			{{Form::label('imagem', 'Imagem:')}}
			{{Form::input('file', 'imagem', null, ['class'=>'form-caixa-texto'])}}
		</div>
	
		<br>
			{{Form::submit('Cadastrar',['class'=>'botao botao-normal'] )}}
		</div>
		{{Form::close()}}
@stop