<?php
session_start();
include('ConectBanco.php');

$data = date('Y-m-d H:i:s');

$obra = $_POST['nomeObra'];
$idade = $_POST['idadeObra'];
$sinopse = $_POST['sinopse'];
$autor = $_POST['autorObra'];
$genero = $_POST['generoObra'];
$imgObra = $_FILES['imgObra'];
$imgWallpaperObra = $_FILES['imgWallpaperObra'];
$versaoAnime = $_POST['inputCBAnime'];
$versaoManga = $_POST['inputCBManga'];
$versaoLightNovel = $_POST['inputCBLightNovel'];
$versaoWebNovel = $_POST['inputCBWebNovel'];

if(empty($versaoAnime)){
	$versaoAnime=NULL;
}
if(empty($versaoManga)){
	$versaoManga=NULL;
}
if(empty($versaoLightNovel)){
	$versaoLightNovel=NULL;
}
if(empty($versaoWebNovel)){
	$versaoWebNovel=NULL;
}


$imgAntigaObra = 0;
$imgAntigaWallpaperObra = 0;

if(isset($_FILES['imgObra'])){
	$pasta = "imagens/obras/imgPrincipalObra/";
	$nomeImgObra = $imgObra['name'];
	$novoNomeImgObra = uniqid();
	$extensaoObra = strtolower(pathinfo($nomeImgObra,PATHINFO_EXTENSION));

	$caminhoImgObra = $pasta . $novoNomeImgObra . "." . $extensaoObra;

	if($extensaoObra != "jpg" && $extensaoObra != 'png' && $extensaoObra != 'jpe' && $extensaoObra != 'jpeg'){
		$_SESSION['imagemObra'] = true;
		header('Location: ../paginas/addObras.php');
		exit; 
	}

	$verificaObra = move_uploaded_file($imgObra["tmp_name"], __DIR__. '../../' . $caminhoImgObra);

	if($verificaObra){
		$imgObra = $caminhoImgObra;
	}

}

if(isset($_FILES['imgWallpaperObra'])){
	$pasta = "imagens/obras/imgWallpaperObra/";
	$nomeImgWallpaperObra = $imgWallpaperObra['name'];
	$novoNomeImgWallpaperObra = uniqid();
	$extensaoWallpaperObra = strtolower(pathinfo($nomeImgWallpaperObra,PATHINFO_EXTENSION));

	$caminhoImgWallpaperObra = $pasta . $novoNomeImgWallpaperObra . "." . $extensaoWallpaperObra;

	if($extensaoWallpaperObra != "jpg" && $extensaoWallpaperObra != 'png' && $extensaoObra != 'jpe' && $extensaoObra != 'jpeg'){
		$_SESSION['wallpaperObra'] = true;
		header('Location: ../paginas/addObras.php');
		exit; 
	}

	$verificaImgWallpaperObra = move_uploaded_file($imgWallpaperObra["tmp_name"], __DIR__. '../../' . $caminhoImgWallpaperObra);

	if($verificaImgWallpaperObra){
		$imgWallpaperObra = $caminhoImgWallpaperObra;
	}

}

$sql = "SELECT * FROM obras where nome = '$obra'";
$result = $conn->query($sql);


if($result->rowCount() > 0) {
	$_SESSION['obra_existe'] = true;
	header('Location: ../paginas/addObras.php');
	exit;
}
//Verifica usuários iguais

$sql = "INSERT INTO obras (nome, faixaEtaria, sinopse, imagemObra, wallpaperObra, dataLancamento,versaoAnime, versaoManga, versaoLightNovel, versaoWebNovel) 
		VALUES ('$obra', '$idade', '$sinopse', '$imgObra', '$imgWallpaperObra', '$data','$versaoAnime', '$versaoManga', '$versaoLightNovel', '$versaoWebNovel')";

if($conn->query($sql) == TRUE) {

	$sqlObra = "SELECT * FROM obras where nome = '$obra'";
	$resultObra = $conn->query($sqlObra);
	$row_obra = $resultObra->fetch(PDO::FETCH_ASSOC);
	$idObra = $row_obra['obras_id'];

	
	foreach($genero as $gen){
		$sqlGen = "SELECT * FROM genero WHERE tipoGenero = '$gen'";
		$resultGen = $conn->query($sqlGen);

		$row_genero = $resultGen->fetch(PDO::FETCH_ASSOC);

		$idGen = $row_genero['genero_id'];

		$sqlObraGen = "INSERT INTO Generos_Obra_Genero(idGenero, idObra) VALUES('$idGen', '$idObra')";
		$resultObraGen = $conn->query($sqlObraGen);
	}

	foreach($autor as $aut){
		$sqlAut = "SELECT * FROM autor WHERE nomeAutor = '$aut'";
		$resultAut = $conn->query($sqlAut);

		$row_autor = $resultAut->fetch(PDO::FETCH_ASSOC);

		$idAut = $row_autor['autor_id'];

		$sqlObraAut = "INSERT INTO Autores_Obra_Autor(idAutor, idObra) VALUES('$idAut', '$idObra')";
		$resultObraAut = $conn->query($sqlObraAut);
	}

	if($resultObraGen == TRUE && $resultObraAut == TRUE){
		$_SESSION['obra_cadastro'] = true;
		header('Location: ../paginas/addObras.php');
		exit;
	}
}

?>