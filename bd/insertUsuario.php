<?php
//Conexão com banco de dados
include_once("../conexao.php");

	$tipo = 'usuario';
	$status = 'ativo';
	
	//Busca todos os usuarios
	$todosUsuario = mysqli_query($con,"SELECT DISTINCT idecoflow, nome from unidade");

	if(isset($todosUsuario)){
			while ($usuario = mysqli_fetch_object($todosUsuario)) {
				//verifica se usuario não existe
				$resUsuario = mysqli_query($con,"SELECT * from usuario where login = '$usuario->idecoflow' ");
				$objUsuario = mysqli_fetch_object($resUsuario);
				if(!isset($objUsuario)){
					//Insere novo usuario
					mysqli_query($con, "INSERT INTO usuario (login, senha, id_unidade, nome, tipo, status) VALUES ('$usuario->idecoflow', '$usuario->idecoflow', $usuario->idecoflow, '$usuario->nome', '$tipo', '$status')");
					echo $usuario->idecoflow.'<br>';
				}
			}
	}else{
		echo 'Não exite usuario na unidade';
	}
?>