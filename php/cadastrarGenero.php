<?php
session_start();
include('ConectBanco.php');
$nomeGenero = filter_input(INPUT_GET, 'nomeGen');

$sql = "SELECT * FROM genero where tipoGenero = '$nomeGenero'";
$result = $conn->query($sql);

if($result->rowCount() > 0) {
	$_SESSION['genero_existe'] = true;
	header('Location: ../paginas/gerenciarGeneros.php');
	exit;
}

$sqlAddGenero = "INSERT INTO genero (tipoGenero) VALUES ('$nomeGenero')";

if($conn->query($sqlAddGenero) == TRUE){
	$_SESSION['genero_inserido'] = true;
	header('Location: ../paginas/gerenciarGeneros.php');
    exit;
}
?>