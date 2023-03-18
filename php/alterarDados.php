<?php
session_start();
include('ConectBanco.php');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$usuario = $_POST['AltUname'];
$senha = $_POST['AltPsw'];
$email = $_POST['AltEmail'];

$animeList = $_POST['AltAnimeList'];
$mangaList = $_POST['AltMangaList'];
$novelList = $_POST['AltNovelList'];

$imgPerfil = $_FILES['AltImgPerfil'];
$imgWallpaper = $_FILES['AltImgWallpaper'];

$verificaAvatar = 0;
$verificaWallpaper = 0;

$imgAntigaAvatar = 0;
$imgAntigaWallpaper = 0;

$sqlAlteraIMGS = "SELECT * FROM usuario WHERE usuario_id = '$id'";
$result = $conn->query($sqlAlteraIMGS);

$row_usuario = $result->fetch(PDO::FETCH_ASSOC);

$avatarPerfil = $row_usuario['fotoPerfil'];
$wallpaperPerfil = $row_usuario['fotoWallpaper'];

$sql = "SELECT * FROM Usuario where email = '$email'";
$result = $conn->query($sql);

$sqlUsuario = "UPDATE Usuario SET apelido = '$usuario' where usuario_id = '$id'";
$resultUsuario = $conn->query($sqlUsuario);

$sqlSenha = "UPDATE Usuario SET senha = '$senha' where usuario_id = '$id'";
$resultSenha = $conn->query($sqlSenha);

$sqlAnimeList = "UPDATE Usuario SET animeList = '$animeList' where usuario_id = '$id'";
$resultAnimeList = $conn->query($sqlAnimeList);

$sqlMangaList = "UPDATE Usuario SET mangaList = '$mangaList' where usuario_id = '$id'";
$resultMangaList = $conn->query($sqlMangaList);

$sqlNovelList = "UPDATE Usuario SET novelList = '$novelList' where usuario_id = '$id'";
$resultNovelList = $conn->query($sqlNovelList);

if(isset($_FILES['AltImgPerfil'])){
	$pasta = "imagens/contas/avataresPerfil/";
	$nomeImgPerfil = $imgPerfil['name'];
	$novoNomeImgPerfil = uniqid();
	$extensaoPerfil = strtolower(pathinfo($nomeImgPerfil,PATHINFO_EXTENSION));

	$caminhoImgAvatar = $pasta . $novoNomeImgPerfil . "." . $extensaoPerfil;

	if($extensaoPerfil != "jpg" && $extensaoPerfil != 'png' && $extensaoPerfil != 'jpeg'){
		if($imgPerfil['name'] == ""){
			$imgAntigaAvatar = 1;
		}
		else{
			die("Imagem de perfil não aceita");
		}
	}

	$verificaAvatar = move_uploaded_file($imgPerfil["tmp_name"], __DIR__. '../../' . $caminhoImgAvatar);

	if($verificaAvatar){
		$avatarPerfil = $row_usuario['fotoPerfil'];
		if($avatarPerfil != 'imagens/contas/avatarBasico.png'){
			unlink( __DIR__. '../../' . $avatarPerfil);
		}

		$sqlImgAvatar = "UPDATE Usuario SET fotoPerfil = '$caminhoImgAvatar' where usuario_id = '$id' ";
		$conn->query($sqlImgAvatar);
	}
}

if(isset($_FILES['AltImgWallpaper'])){
	$pasta = "imagens/contas/wallpapersPerfil/";
	$nomeImgWallpaper = $imgWallpaper['name'];
	$novoNomeImgWallpaper = uniqid();
	$extensaoWallpaper = strtolower(pathinfo($nomeImgWallpaper,PATHINFO_EXTENSION));

	$caminhoImgWallpaper = $pasta . $novoNomeImgWallpaper . "." . $extensaoWallpaper;

	if($extensaoWallpaper != "jpg" && $extensaoWallpaper != 'png' && $extensaoWallpaper != 'jpeg'){
		if($imgWallpaper['name'] == ""){
			$imgAntigaWallpaper = 1;
		}
		else{
			die("Imagem de perfil não aceita");
		}
	}

	$verificaWallpaper = move_uploaded_file($imgWallpaper["tmp_name"], __DIR__. '../../' . $caminhoImgWallpaper);

	if($verificaWallpaper){
		$wallpaperPerfil = $row_usuario['fotoWallpaper'];
		if($wallpaperPerfil != 'imagens/contas/wallpaperBasico.png'){
			unlink( __DIR__. '../../' . $wallpaperPerfil);
		}
		
		$sqlImgWallpaper = "UPDATE Usuario SET fotoWallpaper = '$caminhoImgWallpaper' where usuario_id = '$id' ";
		$conn->query($sqlImgWallpaper);
	}
}

if($resultSenha == TRUE || $resultEmail == TRUE){
	$_SESSION['perfil_atualizado'] = true;
}

if($result->rowCount() > 0) {
	if($email != $row_usuario['email']){
		$_SESSION['usuario_existe'] = true;
		header('Location: ../paginas/perfil.php?id='.$id);
		exit;	
	}
}

$sqlEmail = "UPDATE Usuario SET email = '$email' where usuario_id = '$id'";
$resultEmail = $conn->query($sqlEmail);


if($resultEmail == TRUE){
	$_SESSION['perfil_atualizado'] = true;
	header('Location: ../paginas/perfil.php?id='.$id);
}

exit;
?>