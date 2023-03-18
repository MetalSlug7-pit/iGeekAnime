<?php
include('../php/verificaçãoLogadoAdmin.php');
include_once('../php/ConectBanco.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = $conn->query("SELECT * FROM Obras WHERE obras_id = '$id'");
$result->execute();
$row_obras = $result->fetch(PDO::FETCH_ASSOC);

$resultObraAutor = $conn->query("SELECT idAutor FROM AUTORES_OBRA_AUTOR WHERE idObra = '$id'");
$resultObraGenero = $conn->query("SELECT idGenero FROM GENEROS_OBRA_GENERO WHERE idObra = '$id'");

while($row_obra_autor = $resultObraAutor->fetch(PDO::FETCH_ASSOC)){
	$arrayOA[] = $row_obra_autor['idAutor'];
}

while($row_obra_genero = $resultObraGenero->fetch(PDO::FETCH_ASSOC)){
	$arrayOG[] = $row_obra_genero['idGenero'];
}

$resultAutor = $conn->query("SELECT distinct * FROM Autor");
$resultGenero = $conn->query("SELECT distinct * FROM Genero");

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iGeekAnime</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="sortcut icon" href="imagens/menu/favicon.ico" type="favicon/ico"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="../js/sweetAlert2.js"></script>
	<script src="../js/alertas.js"></script>
	<script src="../js/protegerImagens.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body style="background-color: #171616;">
	<nav class="navbar navbar-expand-lg bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="../index.php">
				<img src="../imagens/menu/logo.png" oncontextmenu="return false;" alt="Bootstrap" width="250" height="250">
			</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0 nav justify-content-center">
			  <li class="nav-item icone">
				<a class="nav-link" href="tudo.php">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid-dots" width="50" height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<circle cx="5" cy="5" r="1" />
						<circle cx="12" cy="5" r="1" />
						<circle cx="19" cy="5" r="1" />
						<circle cx="5" cy="12" r="1" />
						<circle cx="12" cy="12" r="1" />
						<circle cx="19" cy="12" r="1" />
						<circle cx="5" cy="19" r="1" />
						<circle cx="12" cy="19" r="1" />
						<circle cx="19" cy="19" r="1" />
					</svg>
				</a>
			  </li>
			  <li class="nav-item dropdown icone">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="50" height="50" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<circle cx="9" cy="7" r="4" />
						<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
						<path d="M16 3.13a4 4 0 0 1 0 7.75" />
						<path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
					</svg>
				</a>
				<ul class="dropdown-menu">
					<li><a href='gerenciarObras.php' class="dropdown-item">Gerenciar Obras</a></li>
					<li><a href='gerenciarGeneros.php' class="dropdown-item">Gerenciar Gêneros</a></li>
				  	<li><a href='gerenciarAutores.php' class="dropdown-item">Gerenciar Autores</a></li>
				  	<li><a href="../php/logout.php" class="dropdown-item">Sair</a></li>
				</ul>
			  </li>
			</ul>
			<form class="d-flex position-relative" role="search" style="left: -55px;" action="../php/busca.php" method="GET">
			  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nome_obra">
			  <button class="btn btn-outline-light" type="submit">Search</button>
			</form>
		  </div>
		</div>
	</nav>

	<?php
			//Selected faixa etaria
			$check0 = $check1 = $check2 = $check3 = $check4 = $check5 = "";
			switch($row_obras['faixaEtaria']){
				case 0:{
					$check0 = "selected";
					break;
				}
				case 10:{
					$check1 = "selected";
					break;
				}
				case 12:{
					$check2 = "selected";
					break;
				}
				case 14:{
					$check3 = "selected";
					break;
				}
				case 16:{
					$check4 = "selected";
					break;
				}
				case 18:{
					$check5 = "selected";
					break;
				}
			}			
		?>

	<form action="../php/alterarObraSQL.php" enctype="multipart/form-data" method="post">

		<input type="hidden" name="id" value="<?php echo $row_obras['obras_id'];?>">
		
		<label for="nomeObra" style="color: white; margin-left: 50px; margin-top: 50px; font-size: 20px;"><b>Nome</b></label><br>
		<input id="nomeObra" type="text" value="<?php echo $row_obras['nome'];?>" name="nomeObra" style="margin-left: 50px; border-left: none; border-top: none; border-right: none; background: none; color: white;" required><br>
		
		<label for="idadeObra" style="color: white; margin-left: 50px; margin-top: 50px; font-size: 20px;"><b>Classificação</b></label><br>
		<select class="position-absolute" name="idadeObra" id="valIdade" style="margin-left: 50px; margin-top: 5px; width: 65px;" required><br>
			<option class="option" style="background: white;" value="0"<?php echo $check0?>>Livre</option>
			<option class="option" style="background: white;" value="10"<?php echo $check1?>>10</option>
			<option class="option" style="background: white;" value="12"<?php echo $check2?>>12</option>
			<option class="option" style="background: white;" value="14"<?php echo $check3?>>14</option>
			<option class="option" style="background: white;" value="16"<?php echo $check4?>>16</option>
			<option class="option" style="background: white;" value="18"<?php echo $check5?>>18</option>
		</select>
		

		<label for="sinopse" style="color: white; margin-left: 50px; margin-top: 70px; font-size: 20px;"><b>Sinopse</b></label><br>
		<textarea class="position-absolute"  name="sinopse" id="txtAreaSinopse" style="margin-left: 50px; margin-top: 5px; border-left: none; border-top: none; border-right: none; background: none; color: white; width:300px; height:80px; text-align:center;" required></textarea>
		<script> document.getElementById("txtAreaSinopse").innerHTML="<?php echo $row_obras['sinopse'];?>"</script>
		

		<div class="autorObra" style="margin-left: 40px;">
			<label for="autorObra" style="color: white; margin-left: 0px; margin-top: 110px; margin-bottom:10px; font-size: 20px;"><b>Autor</b></label><br>
			<select name="autorObra[]" class="multiple-select-autor" style="margin-top: 20px; width:250px;" required multiple>
				<?php 
					while($row_autores = $resultAutor->fetch(PDO::FETCH_BOTH)){
						$arrayAutores[] = $row_autores;
					}
				?>
				
				<?php 
					foreach($arrayAutores as $aA){
				?>
					<option class="option" value="<?php echo $aA['nomeAutor'];?>"
						<?php
							echo in_array($aA['autor_id'], $arrayOA) ? 'selected':''
						?>>
						<?php 
							echo $aA['nomeAutor'];
						?>
					</option>
				<?php
					}
				?>
			</select>
		</div>

		
		<div class="generoObra" style="margin-left: 40px;">
			<label for="generoObra" style="color: white; margin-left: 0px; margin-top: 30px; font-size: 20px;"><b>Gênero</b></label><br>
			<select name="generoObra[]" class="multiple-select-genero" style="margin-left: 10px; margin-top: 10px; width:250px; background:black;" required multiple>
				<?php 
					while($row_generos = $resultGenero->fetch(PDO::FETCH_BOTH)){
						$arrayGeneros[] = $row_generos;
					}
				?>
				
				<?php 
					foreach($arrayGeneros as $aG){
				?>
					<option class="option" value="<?php echo $aG['tipoGenero'];?>"
						<?php
							echo in_array($aG['genero_id'], $arrayOG) ? 'selected':''
						?>>
						<?php 
							echo $aG['tipoGenero'];
						?>
					</option>
				<?php
					}
				?>
			</select>
		</div>

		<?php
			$resultVersoes = $conn->query("SELECT versaoAnime, versaoManga, versaoLightNovel, versaoWebNovel FROM Obras WHERE obras_id = '$id'");  
			if($resultVersoes->rowCount() > 0){

				if($row_obras['versaoAnime']!=""){
					$verificaVersaoAnime = 'checked';
				}
				else{
					$verificaVersaoAnime = '';
				}

				if($row_obras['versaoManga']!=""){
					$verificaVersaoManga = 'checked';
				}
				else{
					$verificaVersaoManga = '';
				}

				if($row_obras['versaoLightNovel']!=""){
					$verificaVersaoLN = 'checked';
				}
				else{
					$verificaVersaoLN = '';
				}

				if($row_obras['versaoWebNovel']!=""){
					$verificaVersaoWN = 'checked';
				}
				else{
					$verificaVersaoWN = '';
				}
			}
		?>
		
		

		<fieldset style="margin-left: 600px; margin-top: -530px;">
			<legend style="color: white; font-size: 20px;"><b>Versões:</b></legend>
			
			<body onload="versoes()"></body>
			<div>
				<input type="checkbox" id="anime" name="anime" onclick="checkAnime()" <?php echo $verificaVersaoAnime?>>
				<label for="anime" style="color: white;">Anime</label>
				<input type="text" placeholder="URL" value="<?php echo $row_obras['versaoAnime']?>"id="inputCBAnime" name="inputCBAnime" style="margin-left:53px; height:25px; display:none;">
				<input id="vA" type="hidden" name="retiraVersaoAnime">
			</div>
		
			<div>
				<input type="checkbox" id="manga" name="manga" onclick="checkManga()" <?php echo $verificaVersaoManga?>>
				<label for="manga" style="color: white;">Mangá</label>
				<input type="text" placeholder="URL" value="<?php echo $row_obras['versaoManga']?>" id="inputCBManga" name="inputCBManga" style="margin-left:49px; height:25px; display:none;">
				<input id="vM" type="hidden" name="retiraVersaoManga">
			</div>

			<div>
				<input type="checkbox" id="lightNovel" name="lightNovel" onclick="checkLN()" <?php echo $verificaVersaoLN?>>
				<label for="lightNovel" style="color: white;">Light Novel</label>
				<input type="text" placeholder="URL" value="<?php echo $row_obras['versaoLightNovel']?>" id="inputCBLightNovel" name="inputCBLightNovel" style="margin-left:17px; height:25px; display:none;">
				<input id="vLN"type="hidden" name="retiraVersaoLN">
			</div>
		
			<div>
				<input type="checkbox" id="webNovel" name="webNovel" onclick="checkWN()" <?php echo $verificaVersaoWN?>>
				<label for="webNovel" style="color: white;">Web Novel</label>
				<input type="text" placeholder="URL" value="<?php echo $row_obras['versaoWebNovel']?>" id="inputCBWebNovel" name="inputCBWebNovel" style="margin-left:20px; height:25px; display:none;">
				<input id="vWN" type="hidden" name="retiraVersaoWN">
			</div>
		</fieldset>

		<div>
			<label for="imgObra" style="color: white; font-size: 20px; margin-left: 600px; margin-top: 50px;"><b>Capa</b></label><br>
			<img class="preImgObra" style="height:200px; width:150px; margin-left: 600px; margin-top: 10px;"></img>
			<button class="position-absolute" onclick="document.getElementById('imgObraFile').click(); return false;" style="margin-top: 220px; margin-left: -110px;">Upload</button>
			<input id="imgObraFile" style="visibility:hidden" type="file" onchange="previewObra()" name="imgObra">
						

			<label class="position-absolute" for="imgWallpaperObra" style="color: white; font-size: 20px; margin-left: -230px; margin-top: -28px;"><b>Wallpaper</b></label><br>
			<img class="preWallpaperObra" style="height:150px; width:300px; margin-top: -280px; margin-left: 850px;"></img>
			<button class="position-absolute" style="margin-left: -190px; margin-top: -38px;" onclick="document.getElementById('imgWallpaperFile').click();return false;">Upload</button>
			<input id="imgWallpaperFile" style="visibility:hidden" type="file" onchange="previewWallpaper()" name="imgWallpaperObra">
		</div>

		<button class="position-absolute" style="background-color: rgb(201, 189, 25); border: none; border-radius: 10px; margin-left: 1000px; margin-top: 80px; width: 150px;">Alterar</button>
	</form>

	<br></br><br></br><br></br>

	<script>
			$(".multiple-select-autor").select2({
				placeholder: 'Selecione um autor',
				language: {
  					noResults: function () {
      					return 'Nenhum resultado encontrado';
    				}
				}
			});

			$(".multiple-select-genero").select2({
				placeholder: 'Selecione um gênero',
				language: {
  					noResults: function () {
      					return 'Nenhum resultado encontrado';
    				}
				}
			});
	</script>

	<script>
			function previewObra(){
				var imgObra = document.querySelector('input[name=imgObra]').files[0];
				var previewImgObra = document.querySelector('.preImgObra');

				var readerImgObra = new FileReader();

				readerImgObra.onloadend = function(){
					previewImgObra.src= readerImgObra.result;
				}

				if(imgObra){
					readerImgObra.readAsDataURL(imgObra);
				}
				else{
					previewImgObra.src="";
				}
			}

			function previewWallpaper(){
				var wallpaperObra = document.querySelector('input[name=imgWallpaperObra]').files[0];
				var previewWallpaperObra = document.querySelector('.preWallpaperObra');

				var readerWallpaperObra = new FileReader();

				readerWallpaperObra.onloadend = function(){
					previewWallpaperObra.src= readerWallpaperObra.result;
				}

				if(wallpaperObra){
					readerWallpaperObra.readAsDataURL(wallpaperObra);
				}
				else{
					previewWallpaperObra.src="";
				}
			}
		</script>

		<script>
			function checkAnime() {
				var cbAnime = document.getElementById("anime");
				var inputAnime = document.getElementById("inputCBAnime");
				if (cbAnime.checked == true){
					inputAnime.style.display = "inline-block";
					document.getElementById("vA").value = 0;
				}else {
					inputAnime.style.display = "none";
					document.getElementById("vA").value = 1;
				}
			}
			function checkManga() {
				var cbManga = document.getElementById("manga");
				var inputManga = document.getElementById("inputCBManga");
				if (cbManga.checked == true){
					inputManga.style.display = "inline-block";
					document.getElementById("vM").value = 0;
				}else {
					inputManga.style.display = "none";
					document.getElementById("vM").value = 1;
				}
			}
			function checkLN() {
				var cbLN = document.getElementById("lightNovel");
				var inputLN = document.getElementById("inputCBLightNovel");
				if (cbLN.checked == true){
					inputLN.style.display = "inline-block";
					document.getElementById("vLN").value = 0;
				}else {
					inputLN.style.display = "none";
					document.getElementById("vLN").value = 1;
				}
			}
			function checkWN() {
				var cbWN = document.getElementById("webNovel");
				var inputWN = document.getElementById("inputCBWebNovel");
				if (cbWN.checked == true){
					inputWN.style.display = "inline-block";
					document.getElementById("vWN").value = 0;
				}else {
					inputWN.style.display = "none";
					document.getElementById("vWN").value = 1;
				}
			}

			function versoes(){
				checkAnime();
				checkManga();
				checkLN();
				checkWN();
			}
		</script>
</body>
</html>