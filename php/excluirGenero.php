<?php
session_start();
include('ConectBanco.php');
$nomeGenero = filter_input(INPUT_GET, 'nomeGen');

$sql = "SELECT genero_id FROM genero where tipoGenero = '$nomeGenero'";
$result = $conn->query($sql);

$row_genero = $result->fetch(PDO::FETCH_ASSOC);

$genId = $row_genero['genero_id'];

$sqlObraGenero = "DELETE FROM Generos_Obra_Genero WHERE idGenero = '$genId'";
$sqlRemoveGenero = "DELETE FROM Genero WHERE genero_id = '$genId'";

if($conn->query($sqlObraGenero) == TRUE && $conn->query($sqlRemoveGenero) == TRUE){
	$_SESSION['genero_removido'] = true;
	header('Location: ../paginas/gerenciarGeneros.php');
    exit;
}
?>