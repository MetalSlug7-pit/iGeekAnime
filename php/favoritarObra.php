<?php
session_start();
include('ConectBanco.php');

$idUsuario = $_POST['idUsuario'];
$idObra = $_POST['idObra'];

$sql = "SELECT * FROM Favoritar_Obra_Usuario where idUsuario = '$idUsuario' and idObra = '$idObra'";
$result = $conn->query($sql);

if($result->rowCount() > 0) {
	$_SESSION['obra_ja_favoritada'] = TRUE;
	header('Location: ../paginas/obras/obras.php?id='.$idObra);
	exit;
}

$sql = "INSERT INTO favoritar_obra_usuario (idUsuario, idObra) VALUES ('$idUsuario', '$idObra')";

if($conn->query($sql)==TRUE){
    $_SESSION['obra_favoritada_sucesso'] = TRUE;
    header('Location: ../paginas/obras/obras.php?id='.$idObra);
    exit;
}
?>