<?php
session_start();
include('ConectBanco.php');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nomeObra = $_POST['nomeObra'];
$idade = $_POST['idadeObra'];
$sinopse = $_POST['sinopse'];
$autor = $_POST['autorObra'];
$genero = $_POST['generoObra'];
$versaoAnime = $_POST['inputCBAnime'];
$versaoManga = $_POST['inputCBManga'];
$versaoLightNovel = $_POST['inputCBLightNovel'];
$versaoWebNovel = $_POST['inputCBWebNovel'];
$imgObra = $_FILES['imgObra'];
$imgObraWallpaper = $_FILES['imgWallpaperObra'];

$retiraVersaoAnime = $_POST['retiraVersaoAnime'];
$retiraVersaoManga = $_POST['retiraVersaoManga'];
$retiraVersaoLN = $_POST['retiraVersaoLN'];
$retiraVersaoWN = $_POST['retiraVersaoWN'];

if($retiraVersaoAnime == 1){	
	$versaoAnime=NULL;
}

if($retiraVersaoManga == 1){
	$versaoManga=NULL;
}

if($retiraVersaoLN == 1){
	$versaoLightNovel=NULL;
}

if($retiraVersaoWN == 1){
	$versaoWebNovel=NULL;
}

$sqlAlteraIMGS = "SELECT * FROM obras WHERE obras_id = '$id'";
$result = $conn->query($sqlAlteraIMGS);

$row_obras = $result->fetch(PDO::FETCH_ASSOC);

$imgObraCapa = $row_obras['imagemObra'];
$wallpaperObra = $row_obras['wallpaperObra'];

$result = $conn->query("SELECT * FROM Obras where nome = '$nomeObra'");

$resultIdade = $conn->query("UPDATE Obras SET faixaEtaria = '$idade' where obras_id = '$id'");

$resultSinopse = $conn->query("UPDATE Obras SET sinopse = '$sinopse' where obras_id = '$id'");

$resultVersaoAnime = $conn->query("UPDATE Obras SET versaoAnime = '$versaoAnime' where obras_id = '$id'");
$resultVersaoManga = $conn->query("UPDATE Obras SET versaoManga = '$versaoManga' where obras_id = '$id'");
$resultVersaoLN = $conn->query("UPDATE Obras SET versaoLightNovel = '$versaoLightNovel' where obras_id = '$id'");
$resultVersaoWN = $conn->query("UPDATE Obras SET versaoWebNovel = '$versaoWebNovel' where obras_id = '$id'");


#ALTERAR AUTOR DA OBRA
$resultObraAutor = $conn->query("SELECT * FROM AUTORES_OBRA_AUTOR WHERE idObra = '$id'");
while($row_obra_autor = $resultObraAutor->fetch(PDO::FETCH_ASSOC)){
	$arrayOA[] = $row_obra_autor['idAutor'];
}

foreach($arrayOA as $delAut) {
	$resultDelAutor = $conn->query("DELETE FROM AUTORES_OBRA_AUTOR WHERE idAutor = '$delAut' AND idObra = '$id'");
}

foreach($autor as $autObra){
	$resultObraAutor = $conn->query("SELECT * FROM AUTOR WHERE nomeAutor = '$autObra'");
	$row_obra_autor = $resultObraAutor->fetch(PDO::FETCH_ASSOC);
	$idAut = $row_obra_autor['autor_id'];
	$resultAutor = $conn->query("INSERT INTO AUTORES_OBRA_AUTOR (idAutor,idObra) VALUES ('$idAut','$id')");
}

#ALTERAR GENERO DA OBRA
$resultObraGenero = $conn->query("SELECT * FROM GENEROS_OBRA_GENERO WHERE idObra = '$id'");
while($row_obra_genero = $resultObraGenero->fetch(PDO::FETCH_ASSOC)){
	$arrayOG[] = $row_obra_genero['idGenero'];
}

foreach($arrayOG as $delGen){
	$resultGenero = $conn->query("DELETE FROM GENEROS_OBRA_GENERO WHERE idGenero='$delGen' AND idObra = '$id'");
}


foreach($genero as $genObra){
		$resultObraGenero = $conn->query("SELECT * FROM Genero WHERE tipoGenero = '$genObra'");
		$row_obra_genero = $resultObraGenero->fetch(PDO::FETCH_ASSOC);
		$idGen = $row_obra_genero['genero_id'];
		$resultGenero = $conn->query("INSERT INTO GENEROS_OBRA_GENERO (idGenero,idObra) VALUES('$idGen','$id')");
}


if($resultIdade == TRUE || $resultSinopse == TRUE || $resultAutor == TRUE || $resultGenero == TRUE || $resultVersaoAnime == TRUE || $resultVersaoManga == TRUE || $resultVersaoLN == TRUE || $resultVersaoWN == TRUE){
	$_SESSION['obra_alterada'] = true;
}

if(isset($_FILES['imgObra'])){
	$pasta = "imagens/obras/imgPrincipalObra/";
	$nomeImgObra = $imgObra['name'];
	$novoNomeImgObra = uniqid();
	$extensaoObra = strtolower(pathinfo($nomeImgObra,PATHINFO_EXTENSION));

	$caminhoImgObra = $pasta . $novoNomeImgObra . "." . $extensaoObra;

	if($extensaoObra != "jpg" && $extensaoObra != 'png'){
		if($imgObra['name'] == ""){
			$imgAntigaObra = 1;
		}
		else{
			die("Imagem de capa não aceita");
		}
	}

	$verificaObra = move_uploaded_file($imgObra["tmp_name"], __DIR__. '../../' . $caminhoImgObra);

	if($verificaObra){
		$imgObraCapa = $row_obras['imagemObra'];
		unlink( __DIR__. '../../' . $imgObraCapa);

		$sqlImgObra = "UPDATE Obras SET imagemObra = '$caminhoImgObra' where obras_id = '$id' ";
		$conn->query($sqlImgObra);
	}

}

if(isset($_FILES['imgWallpaperObra'])){
	$pasta = "imagens/obras/imgWallpaperObra/";
	$nomeImgWallpaper = $imgObraWallpaper['name'];
	$novoNomeImgWallpaper = uniqid();
	$extensaoWallpaper = strtolower(pathinfo($nomeImgWallpaper,PATHINFO_EXTENSION));

	$caminhoImgWallpaper = $pasta . $novoNomeImgWallpaper . "." . $extensaoWallpaper;

	if($extensaoWallpaper != "jpg" && $extensaoWallpaper != 'png'){
		if($imgObraWallpaper['name'] == ""){
			$imgAntigaWallpaper = 1;
		}
		else{
			die("Imagem de wallpaper não aceita");
		}
	}

	$verificaWallpaper = move_uploaded_file($imgObraWallpaper["tmp_name"], __DIR__. '../../' . $caminhoImgWallpaper);

	if($verificaWallpaper){
		$wallpaperObra = $row_obras['wallpaperObra'];
		unlink( __DIR__. '../../' . $wallpaperObra);

		$sqlImgWallpaper = "UPDATE Obras SET wallpaperObra = '$caminhoImgWallpaper' where obras_id = '$id' ";
		$conn->query($sqlImgWallpaper);
	}
}



if($result->rowCount() > 0) {
	if($nomeObra != $row_obras['nome']){
		$_SESSION['obra_existeAtt'] = true;
		header('Location: ../paginas/obrasAlterar.php');
		exit;
	}
	
}

$sql = "UPDATE OBRAS SET nome = '$nomeObra' where obras_id = '$id'";
$conn->query($sql);

if($conn->query($sql) == TRUE){
	$_SESSION['obra_alterada'] = true;
}

header('Location: ../paginas/obrasAlterar.php');
?>