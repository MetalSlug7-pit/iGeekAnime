<?php
session_start();
include('ConectBanco.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM usuario WHERE usuario_id = '$id'";
//Deletar os dados na tabela login do usuário que estiver logado

$sqlRemoveFav = "DELETE FROM FAVORITAR_OBRA_USUARIO WHERE idUsuario = '$id'";
$sql2 = "SELECT * FROM usuario WHERE usuario_id = '$id'";

$resultRemoveFav = $conn->query($sqlRemoveFav);
$result = $conn->query($sql2);


$row_usuario = $result->fetch(PDO::FETCH_ASSOC);

$avatarPerfil = $row_usuario['fotoPerfil'];
$wallpaperPerfil = $row_usuario['fotoWallpaper'];

if($avatarPerfil != 'imagens/contas/avatarBasico.png'){
    unlink( __DIR__. '../../' . $avatarPerfil);
}

if($wallpaperPerfil != 'imagens/contas/wallpaperBasico.png'){
    unlink( __DIR__. '../../' . $wallpaperPerfil);
}

$resultExcluirUsu = $conn->query($sql);

if($resultRemoveFav == TRUE && $resultExcluirUsu == TRUE){
    $_SESSION['usuario_removido'] = TRUE;
    header('Location: logout.php');
    exit;
}

?>