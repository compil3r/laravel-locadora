@extends('layout')

@section('titulo')
	Locar Filme
@stop

@section('corpo')
	{{Form::open(['route' => 'locacao.store', 'method' => 'post', 'class'=>'form'])}}
		<div class="container">
		<div class="col-12">
		{{Form::label('cliente', 'Cliente: ')}}
		{{Form::select('cliente', $cliente, null, ['class'=>'form-caixa-texto'])}}
		</div>
	<!-- 	<div class="col-6">
		{{Form::label('funcionario', 'Funcionario:')}}

				</div>
	 -->	</div>
		<div class="container">
		<div class="col-12">
		{{Form::label('filmes', 'Filme:')}} <br>
		<select class="form-caixa-texto" name="filme">
		@foreach ($filme as $filmes)
		@if ($filmes->status != 1)
		<option value="{{$filmes->id}}" > {{$filmes->nome}}</option>
		@endif
		@endforeach
		</select>
		</div>
		</div>
		<div class="container">
		<div class="col-12">
		<br>
			{{Form::submit('Cadastrar',['class'=>'botao botao-normal'] )}}
		</div>
		</div>
		
		{{Form::close()}}
@stop 
