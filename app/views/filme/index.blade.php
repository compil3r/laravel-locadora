@extends('layout')

@section('titulo')
Lista de Filmes
@stop

@section('corpo')
<table class="tabela">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Categoria</th>
			<th>Preço</th>
				
		</tr>
	</thead>
	<tbody>
	@if($filme)
	<tr>
		@foreach($filme as $filmes)
		<td>{{$filmes->id}}</td>
		<td><a href="/filmes/{{ $filmes->id }}">{{$filmes->nome}}</a></td>
		
		@foreach($categoria as $categorias)
		@if ($categorias->id == $filmes->categoriaid)
		<td>{{$categorias->nome}}</td>
		<td>{{$categorias->preco}}</td>
		@endif
		@endforeach
		<td><button class="botao botao-sucesso" onclick="location.href='/filmes/{{$filmes->id}}/edit'">Editar</button></td>
			<td>{{ Form::open(['route' => ['filmes.destroy', $filmes->id], 'method' => 'delete']) }}
					{{ Form::submit('Deletar', ['class'=>'botao botao-erro'])}}
				{{ Form::close()}}	
			</td>
	</tr>
	@endforeach	
@endif
</tbody>
</table>
<center><button class="botao botao-normal" onclick="location.href='/filmes/create'">Adicionar Novo</button></center>
@stop