<?php
session_start();
include('ConectBanco.php');
$nomeAutor = filter_input(INPUT_GET, 'nomeAutor');

$sql = "SELECT * FROM autor where nomeAutor = '$nomeAutor'";
$result = $conn->query($sql);

if($result->rowCount() > 0) {
	$_SESSION['autor_existe'] = true;
	header('Location: ../paginas/gerenciarAutores.php');
	exit;
}

$sqlAddAutor = "INSERT INTO autor (nomeAutor) VALUES ('$nomeAutor')";

if($conn->query($sqlAddAutor) == TRUE){
	$_SESSION['autor_inserido'] = true;
	header('Location: ../paginas/gerenciarAutores.php');
    exit;
}
?>