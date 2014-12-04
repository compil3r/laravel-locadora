@extends('layout')

@section('titulo')
	Clientes<br>
	
@stop
@section('corpo')
<table class="tabela">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>CPF</th>
			<th>Email</th>
			<th>Criado em</th>
			<th>Alterado em</th>
			
		</tr>
	</thead>
	<tbody>
	@if ($cliente)
		@foreach ($cliente as $clientes)
		<tr>
			<td>{{$clientes->id}}</td>
			<td><a href="/clientes/{{ $clientes->id }}">{{$clientes->nome}}</a></td>
			<td>{{$clientes->cpf}}</td>
			<td>{{$clientes->email}}</td>
			<td>{{$clientes->created_at}}</td>
			<td>{{$clientes->updated_at}}</td>
			<td><button class="botao botao-sucesso" onclick="location.href='/clientes/{{$clientes->id}}/edit'">Editar</button></td>
			<td>{{ Form::open(['route' => ['clientes.destroy', $clientes->id], 'method' => 'delete']) }}
					{{ Form::submit('Deletar', ['class'=>'botao botao-erro'])}}
				{{ Form::close()}}	
			</td>
		</tr>
		@endforeach
	@endif
	</tbody>
</table>
<center><button class="botao botao-normal" onclick="location.href='/clientes/create'">Adicionar Novo</button></center>
@stop
