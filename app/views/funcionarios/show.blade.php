@extends('layout')

@section('titulo')
	Usuário: {{ $user->nome }}
@stop

@section('corpo')
	<table class="tabela">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>E-mail</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->nome }}</td>
				<td>{{ $user->email }}</td>
			</tr>
		</tbody>
	</table>
@stop