@extends('layout')
@section('titulo')
	Editar Filme
@stop
@section('corpo')
	{{Form::model($filme, ['route' => ['filmes.update', $filme->id], 'method' => 'put'])}}
		<div>

			{{Form::label('nome', 'Nome:')}}
			{{Form::text('nome', $filme->nome, ['class'=>'form-caixa-texto'])}}
			{{ $errors->first('nome') }}

		</div>
		<div>
			{{Form::label('sinopse', 'Sinopse:')}}
			{{Form::textarea('sinopse',$filme->sinopse, ['class'=>'form-caixa-texto', 'style'=>'height:100px;'])}}
			{{ $errors->first('sinopse')}}
		</div>
		<div>
			{{Form:: label('lancamento', 'Lançamento:')}}
			{{Form::input('date', 'lancamento', $filme->lancamento, ['class'=>'form-caixa-texto'])}}
			{{$errors->first('data')}}
		</div>
		<div>
			{{Form:: label('classificacao', 'Classificação:')}}
			{{Form::input('number', 'classifciacao', $filme->classificacao, ['class'=>'form-caixa-texto'])}}
			{{$errors->first('classificacao')}}
		</div>
		<div>
			{{Form::label('categoria', 'Categoria:')}}
			{{ Form::select('categoria', $categoria, '', ['class'=>'form-caixa-texto']) }}
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