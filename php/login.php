<?php
session_start();
include('ConectBanco.php');

$usuario = $_POST['uname'];
$email = $_POST['uname'];
$senha = $_POST['psw'];


$result = $conn->query("select * from usuario where email = '{$email}' and senha = '{$senha}'");
//Vai até a tabela login, para verificar se os dados digitados pela pessoa que deseja fazer login existem ou não

$row = $result->rowCount();

	if(isset($_POST['manterOn']))
	{
		$_SESSION['manterLogin'] = true;
	}

	if($row == 1){
		$usuarioID = $result -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['usuario'] = $usuario;
		$_SESSION['id'] = $usuarioID['usuario_id'];
		$_SESSION['logado'] = true;
		header('Location: ../index.php');
		exit();
	}

	if($usuario == 'admin' && $senha == 'iGeekAnime'){
		$_SESSION['admin'] = $usuario;
		$_SESSION['senhaAdmin'] = $senha;
		$_SESSION['adminLogado'] = true;
		header('Location: ../index.php');
		exit();
	}
	
	else{
		$_SESSION['nao_autenticado'] = true;
		$_SESSION['usuario_nao_existe'] = true;
		header('Location: ../index.php');
		exit();
	}
?>