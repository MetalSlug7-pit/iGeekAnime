<?php
session_start();
include('ConectBanco.php');

$idUsuario = $_POST['idUsuario'];
$idObra = $_POST['idObra'];

$sql = "SELECT * FROM Favoritar_Obra_Usuario where idUsuario = '$idUsuario' AND idObra = '$idObra'";
$result = $conn->query($sql);

if($result->rowCount() < 0) {
	$_SESSION['obra_nao_favoritada'] = TRUE;
	header('Location: ../paginas/obras/obras.php?id='.$idObra);
	exit;
}

$sql = "DELETE FROM Favoritar_Obra_Usuario WHERE idUsuario = '$idUsuario' AND idObra = '$idObra'";

if($conn->query($sql)==TRUE){
    $_SESSION['obra_desfavoritada_sucesso'] = TRUE;
    header('Location: ../paginas/obras/obras.php?id='.$idObra);
    exit;
}
?>