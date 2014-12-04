<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Sistema Locadora</title>
	<link href="http://localhost:8000/assets/css/framework.css" rel="stylesheet">
	<style>
			.msg{
				background-color:#848484;
				opacity: 0.7;
			}

	</style>
</head>
<body> 
@if (Auth::check())
      <div class="container">
        <div class="col-12">
            <nav>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="/locar"><i class="icone-inicio"></i> Realizar Locação</a>
                    </li>
                    <li class="menu-item">
                        <a href="/locacao"><i class="icone-alerta"></i> Verificar Locações</a>
                    </li>
                    <li class="menu-item">
                        <a href="/clientes"><i class="icone-usuario"></i> Clientes</a>
                    </li>
                   
                    <li class="menu-item">
                      <a href="/filmes"><i class="icone-filmadora"></i> Filmes</a>
                    </li>
                     <li class="menu-item">
                      <a href="/funcionarios"><i class="icone-usuario"></i>Funcionarios</a>
                    </li>
                    <li class="menu-item">
                      <a href="/logout"><i class="icone-sair"></i> Sair</a>
                    </li>
                    <li class="menu-item">
                    <font color="#a3b6bb">Você está logado como: <b>{{Auth::user()->nome;}} </b></font>
                    </li> 

                </ul>
            </nav>
        </div>
        </div>
@endif
       <div class="painel">
        <div class="painel-cab">  <h1><center>@yield('titulo', 'Realizar Locação')</center></h1></div>
       	
       	@section('message')
				@if($errors->first())
			<div class="msg">
          {{$errors->first()}}
			</div>
				@endif<div class="painel-corpo">
       @section('corpo')
       <p>Bem vindo ao Sistema de Locadora</p>
       @show
       </div>
       <div class="painel-rodape">
	    <footer>
    	@section('footer')
    	<p> <br><center>Sistema Locadora © Todos os direitos reservados.</center>
    	</p>
    	@show 
    </footer>
</div>
</div>
</body>
</html>