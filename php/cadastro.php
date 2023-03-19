<?php
session_start();
include('ConectBanco.php');

$usuario = $_POST['uname'];
$senha = $_POST['psw'];
$email = $_POST['email'];

$animeList = null;
$mangaList = null;
$novelList = null;
$dataConta = date('Y-m-d');
$caminhoAvatarBasico = "imagens/contas/avatarBasico.png";
$caminhoWallpaperBasico = "imagens/contas/wallpaperBasico.png";

$sql = "SELECT * FROM usuario where email = '$email'";
$result = $conn->query($sql);
//Vai até a tabela login, para verificar se o usuário adicionado é igual a outro já existente

if($result->rowCount() > 0) {
	$_SESSION['usuario_existe'] = true;
	header('Location: ../index.php');
	exit;
}

if($usuario == 'admin' || $senha=='iGeekAnime'){
	$_SESSION['usuario_existe'] = true;
	header('Location: ../index.php');
	exit;
}
//Verifica usuários iguais

$sql = "INSERT INTO usuario (apelido, senha, email, fotoPerfil, fotoWallpaper, dataConta, animeList, mangaList, novelList) VALUES ('$usuario', '$senha', '$email', '$caminhoAvatarBasico', '$caminhoWallpaperBasico', '$dataConta', '$animeList', '$mangaList', '$novelList')";

if($conn->query($sql) == TRUE) {
	$_SESSION['status_cadastro'] = true;
}

header('Location: ../index.php');
exit;
?>