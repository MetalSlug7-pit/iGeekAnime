<?php
include('../php/verificaçãoLogadoAdmin.php');
include('../php/ConectBanco.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iGeekAnime</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="sortcut icon" href="imagens/menu/favicon.ico" type="favicon/ico"/>
	<link rel="stylesheet" type="text/css" href="../css/gerenciarObras.css"/>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../js/protegerImagens.js"></script>
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

	<!--<?php
		if(isset($_SESSION['obra_excluida'])):
	?>
		<body onload="obraExcluida()"></body>	
	
	<?php
		endif;
		unset($_SESSION['obra_excluida']);
	?>-->

        <div class="container">
			<div class="adicionar" onclick="window.location='addObras.php';">
                <label class="tituloAdd">Adicionar Obras</label>
            </div>	

            <div class="alterar" onclick="window.location='obrasAlterar.php';">
                <label class="tituloAlt">Alterar Obras</label>
            </div>

            <div class="excluir" onclick="window.location='obrasExcluir.php';">
                <label class="tituloExc">Excluir Obras</label>
            </div>
        </div>
</body>
</html>