@extends('layout')

@section('titulo')
	Filme: {{$filme->nome}}
@stop

@section('corpo')
<div class="container">
<div class="col-12">
	<div class="col-4">
	<img src="/arquivos/{{$filme->imagem}}">
	</div>

	<div class="col-8">
		<b>Classificação:</b> {{$filme->classificacao}} anos <br>
		<b>Lançamento:</b> {{$filme->lancamento}}<br>
		<b>Sinopse: </b> {{$filme->sinopse}} <br>
		<b>Categoria: </b>{{$categoria->nome}} <br>
		<b>Preço: </b>{{$categoria->preco}} <br>
	</div>

</div>
</div>

@stop