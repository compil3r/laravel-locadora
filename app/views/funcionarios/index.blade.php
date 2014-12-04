 @extends('layout')

@section('titulo')
	Funcionários<br>
	
@stop
@section('corpo')
<table class="tabela">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Criado em</th>
			<th>Alterado em</th>
			
		</tr>
	</thead>
	<tbody>
	@if ($users)
		@foreach ($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td><a href="/funcionarios/{{ $user->id }}">{{$user->nome}}</a></td>
			<td>{{$user->email}}</td>
			<td>{{$user->created_at}}</td>
			<td>{{$user->updated_at}}</td>
			<td><button class="botao botao-sucesso" onclick="location.href='/funcionarios/{{$user->id}}/edit'">Editar</button></td>
			<td>{{ Form::open(['route' => ['funcionarios.destroy', $user->id], 'method' => 'delete']) }}
					{{ Form::submit('Deletar', ['class'=>'botao botao-erro'])}}
				{{ Form::close()}}	
			</td>
		</tr>
		@endforeach
	@endif
	</tbody>
</table>
<center><button class="botao botao-normal" onclick="location.href='/funcionarios/create'">Adicionar Novo</button></center>
@stop
