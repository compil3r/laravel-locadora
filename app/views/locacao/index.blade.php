@extends('layout')

@section('titulo')
	Locacoes
@stop

@section('corpo')

<table class="tabela tabela-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cliente</th>
			<th>Filme</th>
			<th>Preço</th>
			<th>Funcionario</th>
			<th>Devolução</th>
				
		</tr>
	</thead>
	<tbody>
	@if($locacao)
	@foreach($locacao as $locacoes)
		@foreach($filme as $filmes)
		@if ($filmes->id == $locacoes->filmesid)
		@if ($filmes->status == 1)
		<tr class="devolvido">
		@else
		<tr>
		@endif	
		@endif
		@endforeach

		<td>{{$locacoes->id}}</td>

		@foreach($cliente as $clientes)
		@if ($clientes->id == $locacoes->clienteid)
		<td>{{$clientes->nome}}</td>
		@endif
		@endforeach

		@foreach($filme as $filmes)
		@if ($filmes->id == $locacoes->filmesid)
		<td>{{$filmes->nome}}</td>
			@foreach($categoria as $categorias)
				@if ($categorias->id == $filmes->categoriaid)
				<td>{{$categorias->preco}}</td>
				@endif
			@endforeach
		@endif
		@endforeach

		@foreach($funcionario as $funcionarios)
		@if ($funcionarios->id == $locacoes->funcionarioid)
		<td>{{$funcionarios->nome}}</td>
		@endif
		@endforeach

		<td>{{$locacoes->datadevolucao}}</td>

		@foreach($filme as $filmes)
		@if ($filmes->id == $locacoes->filmesid)
			@if ($filmes->status==1) 
			<td>
			{{Form::open(['route' => ['locacao.update', $filmes->id], 'method' => 'put'])}}
			{{Form::submit('Devolver', ['class'=>'botao botao-sucesso'])}}

			{{Form::close()}}
			</td>	
			@else 
			<td> Devolvido </td>
			@endif
			@endif
			@endforeach
		
		
	</tr>
@endforeach	
@endif
</tbody>
</table>
<center><button class="botao botao-normal" onclick="location.href='/locar'">Adicionar Novo</button></center>
@stop