<?php
include('../php/verificaçãoLogadoAdmin.php');
include_once('../php/ConectBanco.php');
$resultAutor = $conn->query("SELECT distinct nomeAutor FROM Autor");
$resultGenero = $conn->query("SELECT distinct tipoGenero FROM Genero");
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
				<img src="../imagens/menu/logo.png" alt="Bootstrap" width="250" height="250">
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
		if(isset($_SESSION['obra_cadastro'])):
	?>
		<body onload="cadastroObra()"></body>	
	<?php
		elseif(isset($_SESSION['imagemObra'])):
	?>
		<body onload="imagemObra()"></body>		
	<?php
		elseif(isset($_SESSION['wallpaperObra'])):
	?>
		<body onload="wallpaperObra()"></body>
	<?php
		elseif(isset($_SESSION['obra_existe'])):
	?>
		<body onload="obraExiste()"></body>
	<?php
		endif;
		unset($_SESSION['obra_cadastro']);
		unset($_SESSION['imagemObra']);
		unset($_SESSION['wallpaperObra']);
		unset($_SESSION['obra_existe']);
	?>


	<form action="../php/cadastrarObras.php" enctype="multipart/form-data" method="post">
			
			<label for="nomeObra" style="color: white; margin-left: 50px; margin-top: 50px; font-size: 20px;"><b>Nome</b></label><br>
			<input id="nomeObra" type="text"  name="nomeObra" style="margin-left: 50px; border-left: none; border-top: none; border-right: none; background: none; color: white;" required><br>
		
			<label for="idadeObra" style="color: white; margin-left: 50px; margin-top: 50px; font-size: 20px;"><b>Classificação</b></label><br>
			<select class="position-absolute" name="idadeObra" id="valIdade" style="margin-left: 50px; margin-top: 5px; width: 65px;" required><br>
				<option class="option" value="0" style="background: white;">Livre</option>
				<option class="option" style="background: white;">10</option>
				<option class="option" style="background: white;">12</option>
				<option class="option" style="background: white;">14</option>
				<option class="option" style="background: white;">16</option>
				<option class="option" style="background: white;">18</option>
			</select>
		
			<label for="sinopse" style="color: white; margin-left: 50px; margin-top: 50px; font-size: 20px;"><b>Sinopse</b></label><br>
			
			<textarea class="position-absolute"  name="sinopse" style="margin-left: 50px; margin-top: 5px; border-left: none; border-top: none; border-right: none; background: none; color: white; width:300px; height:80px; text-align: justify;" required></textarea>

		<div class="autorObra" style="margin-left: 40px;">
			<label for="autorObra" style="color: white; margin-left: 0px; margin-top: 110px; margin-bottom:10px; font-size: 20px;"><b>Autor</b></label><br>
			<select name="autorObra[]" class="multiple-select-autor" style="margin-top: 20px; width:250px;" required multiple>
			<?php 
				while($row_autores = $resultAutor->fetch(PDO::FETCH_BOTH)){
					$arrayAutores[] = $row_autores['nomeAutor'];
			?>
							
			<div>
				<option class="option" value="<?php echo $row_autores['nomeAutor']?>"><?php echo $row_autores['nomeAutor']?></option>
			</div>
			
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
						$arrayGeneros[] = $row_generos['tipoGenero'];
				?>
							
				<div>
					<option class="option" value="<?php echo $row_generos['tipoGenero']?>"><?php echo $row_generos['tipoGenero']?></option>
				</div>
				<?php
					}
				?>
			</select>
		</div>

		<fieldset style="margin-left: 600px; margin-top: -510px;">
			<legend style="color: white; font-size: 20px;"><b>Versões:</b></legend>
		
			<div>
				<input type="checkbox" id="anime" name="anime" onclick="checkAnime()">
				<label for="anime" style="color: white;">Anime</label>
				<input type="text" placeholder="URL" id="inputCBAnime" name="inputCBAnime" style="margin-left:53px; height:25px; display:none;">
			</div>
		
			<div>
				<input type="checkbox" id="manga" name="manga" onclick="checkManga()">
				<label for="manga" style="color: white;">Mangá</label>
				<input type="text" placeholder="URL" id="inputCBManga" name="inputCBManga" style="margin-left:49px; height:25px; display:none;">
			</div>

			<div>
				<input type="checkbox" id="lightNovel" name="lightNovel" onclick="checkLN()">
				<label for="lightNovel" style="color: white;">Light Novel</label>
				<input type="text" placeholder="URL" id="inputCBLightNovel" name="inputCBLightNovel" style="margin-left:17px; height:25px; display:none;">
			</div>
		
			<div>
				<input type="checkbox" id="webNovel" name="webNovel" onclick="checkWN()">
				<label for="webNovel" style="color: white;">Web Novel</label>
				<input type="text" placeholder="URL" id="inputCBWebNovel" name="inputCBWebNovel" style="margin-left:20px; height:25px; display:none;">
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

		<button class="position-absolute" style="background-color: rgb(46, 201, 25); border: none; border-radius: 10px; margin-left: 1000px; margin-top: 80px; width: 150px;">Adicionar</button>
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
				}else {
					inputAnime.style.display = "none";
				}
			}
			function checkManga() {
				var cbManga = document.getElementById("manga");
				var inputManga = document.getElementById("inputCBManga");
				if (cbManga.checked == true){
					inputManga.style.display = "inline-block";
				}else {
					inputManga.style.display = "none";
				}
			}
			function checkLN() {
				var cbLN = document.getElementById("lightNovel");
				var inputLN = document.getElementById("inputCBLightNovel");
				if (cbLN.checked == true){
					inputLN.style.display = "inline-block";
				}else {
					inputLN.style.display = "none";
				}
			}
			function checkWN() {
				var cbWN = document.getElementById("webNovel");
				var inputWN = document.getElementById("inputCBWebNovel");
				if (cbWN.checked == true){
					inputWN.style.display = "inline-block";
				}else {
					inputWN.style.display = "none";
				}
			}
		</script>
</body>
</html>