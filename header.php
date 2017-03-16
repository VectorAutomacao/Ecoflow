<?php include_once("conexao.php"); //conexão para banco de dados ?>
<?php session_start(); ?>

<?php 
	if ( !isset($_SESSION['tipo']) ){
		$_SESSION['tipo'] = null;
	}
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>ECOflow</title>

	<!-- Icone de pagina-->
	<link rel="icon" href="../img/ECOFlow.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="../img/ECOFlow.ico" type="image/x-icon" />

	<!-- CSS para Bootsrap -->
	<link rel="stylesheet"  href="../css/bootstrap.min.css">
	<link rel="stylesheet"  href="../css/bootstrap-theme.min.css">
	
	<!-- JQuery para bootsrap -->
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<!--Links para grafico Chart-->
	<script src="../js/Chart.min.js"></script>

	<!--CSS do site-->
	<link rel="stylesheet"  href="../css/estilo.css">

	<!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="tudo">

	<!-- Tag para navbar -->
	<nav class="navbar navbar-default navbar-fixed-top navbar-transparente">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		    <!--botão do menu mobile-->
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

		        <span class="sr-only">Menu</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>

		      </button>
		      <!--Logo e link na brand-->
		    <a href="../index.html" class="navbar-brand">  
	      	<div id="barnav-link">
	      		<img alt="Brand" src="../img/ECOFlow.ico" id="imgbrand">
	      		<strong>ECO</strong>flow
	      	</div>
		      </a>
		    </div>

		    <!--Menu da navbar-->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">

					<!--desenha divisor entre brand e menu-->
					<li class="hidden-xs divisor" role="separator"></li>

					<!--Menu Usuario-->
					<?php if($_SESSION['tipo'] == 'usuario'){ ?>
						<!--Opção relatorio-->
						<li>
				           	<a href="../home/home.php">Home</a>
				        </li>
				        <li>
				           	<a href="../relatorio/relatorioMes.php">Consumo Mês</a>
				        </li>
				        <li>
				            <a href="../relatorio/relatorioAno.php">Consumo Ano</a>
				        </li>
			       	<?php } ?>

			       	<!--Menu ADM-->
			        <?php if($_SESSION['tipo'] == 'admin'){ ?>

			        	<li>
				           	<a href="../home/homeAdmin.php">Home</a>
				        </li>

			        	<!--Opção relatorio-->
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" id="barnav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          	Relatório
				          	<span class="caret"></span>
				          </a>
				          <ul class="dropdown-menu">
				            <li>
				            	<a href="../relatorio/buscaGrupo.php">Consumo e Leitura</a>
				            </li>
				          </ul>
				        </li><!--Fecha li relatorio-->
			      
						<!--Opção Grupos-->
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" id="barnav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          	Grupos
				          	<span class="caret"></span>			          
				          	</a>
				          <ul class="dropdown-menu">
				            <li>
				            	<a href="../grupo/buscaGrupo.php">Buscar e Alterar grupo</a>
				            </li>
				          </ul>
				        </li><!--Fecha li grupo-->
				        
						<!--Opção Usuarios-->
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" id="barnav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          	Usuários
				          	<span class="caret"></span>			          
				          	</a>
				          <ul class="dropdown-menu">
				            <li>
				            	<a href="../usuario/criaUsuario.php">Criar novo usuário</a>
				            </li>
				            <li>
				            	<a href="../usuario/buscaUsuario.php">Buscar e alterar usuário</a>
				            </li>
				          </ul>
				        </li><!--Fecha li usuarios-->

			       <?php } ?>

			       <!--Menu Sindico-->
			       <?php if($_SESSION['tipo'] == 'sind'){ ?>

			       		<li> <a href="../home/home.php">Home</a> </li>

				         <!--Opção relatorio-->
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" id="barnav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          	Relatório
				          	<span class="caret"></span>
				          </a>
				          <ul class="dropdown-menu">
				            <li>
				            	<a href="../relatorio/listaPlanta.php">Consumo por Torre</a>
				            </li>
				            <li>
				            	<a href="../relatorio/grupoConsumo.php">Consumo por Grupo</a>
				            </li>
				          </ul>
				        </li><!--Fecha li relatorio-->

						<!--Opção Grupos-->
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" id="barnav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				          	Grupo
				          	<span class="caret"></span>			          
				          	</a>
				          <ul class="dropdown-menu">
				            <li>
				            	<a href="../grupo/alteraGrupo.php">Alterar Grupo</a>
				            </li>
				          </ul>
				        </li><!--Fecha li usuarios-->

			       <?php } ?>

				</ul>

				<!--Navbar a direita-->
				<ul class="nav navbar-nav navbar-right">
					<!--Muda menu se esta logado ou deslogado-->
					<?php if( !isset($_SESSION["id"])){ ?>
						<!--Menu para deslogado-->
						<li>
							<a id="barnav-link" href="../login/validaLogin.php"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Entrar</a>
						</li>

					<?php }else{ ?>
						<!--Menu para logado-->
						<li>
							<li class="dropdown">
					          <a id="barnav-link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
					          	<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
					          	<?php echo $_SESSION["login"] ?>
					          	<span class="caret"></span>
					          </a>
					          <ul class="dropdown-menu">
					            <li>
					            	<a href="../login/alteraEmail.php">
						            	<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						            	E-mail
					            	</a>
					            </li>
						        <li>
						        	<a href="../login/alteraConta.php"> 
						        	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						        	Conta
						        	</a>
						        </li>
						        <li role="separator" class="divider"></li>
						        <li>
						        	<a href="../sair.php">
						        		<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 
						        		Sair
						        	</a>
						        </li>
					          </ul>
					        </li>
						</li><!--Fecha menu logado-->

					<?php } ?>
				</ul><!--Fecha ul da navbar-right-->

			</div><!--Fecha menu da navbar-->
		</div><!--Fecha container-fluid-->
	</nav> <!--Fim da navbar-->

	<!--Tag para o conteudo da pagina-->
	<div class="container" id="conteudo">

		<div style="display: none">
			<div id="topo">Topo</div>
		</div>

		<!--Menssagem de Alerta-->
		 <div class="row">
			<div class="mensagme text-center col-sm-8 col-sm-offset-2">

				<?php if(isset($_GET['error'])){ ?> 

					<div class="alert alert-danger alert-dismissible" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<?php echo $_GET['error'] ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				<?php }else if(isset($_GET['success'])){ ?>

					<div class="alert alert-success alert-dismissible" role="alert">
						<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
						<?php echo $_GET['success'] ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				<?php } ?>
				
			</div>
		</div>
