<?php
session_start();
include('ConectBanco.php');
$nomeAutor = filter_input(INPUT_GET, 'nomeAutor');

$sql = "SELECT autor_id FROM autor where nomeAutor = '$nomeAutor'";
$result = $conn->query($sql);

$row_autor = $result->fetch(PDO::FETCH_ASSOC);

$autorId = $row_autor['autor_id'];

$sqlObraAutor = "DELETE FROM Autores_Obra_Autor WHERE idAutor = '$autorId'";
$sqlRemoveAutor = "DELETE FROM Autor WHERE autor_id = '$autorId'";

if($conn->query($sqlObraAutor) == TRUE && $conn->query($sqlRemoveAutor) == TRUE){
	$_SESSION['autor_removido'] = true;
	header('Location: ../paginas/gerenciarAutores.php');
    exit;
}
?>