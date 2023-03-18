<?php
session_start();
include('ConectBanco.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM Obras WHERE obras_id = '$id'";

$sqlRemoveFav = "DELETE FROM FAVORITAR_OBRA_USUARIO WHERE idObra = '$id'";
$sqlObraGenero = "DELETE FROM Generos_Obra_Genero WHERE idObra = '$id'";
$sqlObraAutor = "DELETE FROM Autores_Obra_Autor WHERE idObra = '$id'";
//Deletar os dados na tabela login do usuário que estiver logado

$sql2 = "SELECT * FROM Obras WHERE obras_id = '$id'";

$result = $conn->query($sql2);

$row_obras = $result->fetch(PDO::FETCH_ASSOC);

$imgObra = $row_obras['imagemObra'];
$wallpaperObra = $row_obras['wallpaperObra'];

unlink( __DIR__. '../../' . $imgObra);
unlink( __DIR__. '../../' . $wallpaperObra);

$conn->query($sqlRemoveFav);
$conn->query($sqlObraGenero);
$conn->query($sqlObraAutor);

$conn->query($sql);
$verifica = $conn->query($sql2);

if($verifica->rowCount() == 0) {
	$_SESSION['obra_excluida'] = true;
	header('Location: ../paginas/obrasExcluir.php');
	exit;
}
?>