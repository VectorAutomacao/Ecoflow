<?php 
	//conexão com BD
	include_once("../conexao.php");

	//iniciar sessão
	session_start();
	//variavel de sessão
	$idecoflow = $_SESSION['idecoflow'];

	$rua = $_POST['rua'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$cep = $_POST['cep'];
	$telefone = $_POST['telefone'];
	
	if($telefone != null){
		mysqli_query($con, "UPDATE grupo SET rua = '$rua', numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$uf', cep = '$cep', telefone = '$telefone' where  id = '$idecoflow'");
		header("Location: ../home/home.php?success=Endereço alterado com sucesso.");
	}else{
		mysqli_query($con, "UPDATE grupo SET rua = '$rua', numero = '$numero', bairro = '$bairro', cidade = '$cidade', estado = '$uf', cep = '$cep' where  id = '$idecoflow'");
		header("Location: ../home/home.php?success=Endereço alterado com sucesso.");
	}


 ?>