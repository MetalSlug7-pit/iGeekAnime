<?php
session_start();
include_once('../php/ConectBanco.php');	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>iGeekAnime</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="sortcut icon" href="imagens/menu/favicon.ico" type="favicon/ico"/>
	<link rel="stylesheet" type="text/css" href="../css/tudo.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/sweetAlert2.js"></script>
	<script src="js/alertas.js"></script>
	<script src="../js/protegerImagens.js"></script>
</head>
<body style="visibility: hidden !important; background-color: #171616;">
	<div id="babasbmsgx" style="visibility: visible !important;">Por favor, desabilite seus bloqueadores de anúncios e de scripts para visualizar esta página</div>
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
				<?php
					if(isset($_SESSION['logado'])):
				?>
					<ul class="dropdown-menu">
						<li><?php echo "<a href='perfil.php?id=" . $_SESSION['id'] . "'class='dropdown-item'>Perfil</a>";?></li>
				  		<li><a href="../php/logout.php" class="dropdown-item">Sair</a></li>
					</ul>
			  </li>

				<?php
					elseif(isset($_SESSION['adminLogado'])) :
				?>
					<ul class="dropdown-menu">
						<li><a href='gerenciarObras.php' class="dropdown-item">Gerenciar Obras</a></li>						
						<li><a href='gerenciarGeneros.php' class="dropdown-item">Gerenciar Generos</a></li>
						<li><a href='gerenciarAutores.php' class="dropdown-item">Gerenciar Autores</a></li>
				  		<li><a href="../php/logout.php" class="dropdown-item">Sair</a></li>
					</ul>
			  </li>
				<?php
					else :
				?>
					<ul class="dropdown-menu">
							<li><a onclick="document.getElementById('loginModal').style.display='block'" data-bs-toggle="modal" data-bs-target="#loginModal" class="dropdown-item">Fazer Login</a></li>
							<li><a onclick="document.getElementById('cadastroModal').style.display='block'" data-bs-toggle="modal" data-bs-target="#cadastroModal" class="dropdown-item">Fazer Cadastro</a></li>
						</ul>
				</li>
				<?php
					endif;
					unset($_SESSION['nao_autenticado']);
				?>  
			</ul>
			<form class="d-flex position-relative" role="search" style="left: -55px;" action="../php/busca.php" method="GET">
			  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nome_obra">
			  <button class="btn btn-outline-light" type="submit">Search</button>
			</form>
		  </div>
		</div>
	</nav>

	<!-- Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<img src="../imagens/contas/avatarRegistro.png" width="100%" height="436px">
				<form action="../php/login.php" method="post">
					<center><div class="modal-body mx-auto">
						<input type="text" placeholder="E-mail" name="uname" required>
						<input type="password" placeholder="Senha" name="psw" required>
					</div></center>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary position-relative" style="left: -12em;">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<img src="../imagens/contas/avatarRegistro.png" width="100%" height="436px">
				<form action="../php/cadastro.php" method="post">
					<center><div class="modal-body mx-auto">
						<input type="text" placeholder="Usuário" name="uname" style="width:150px" required>
						<input type="password" placeholder="Senha" name="psw" style="width:150px" required>
						<input type="email" placeholder="E-mail" name="email" style="width:150px" required>
					</div></center>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary mx-auto" style="width: 200px;">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
		<li class="nav-item">
		  <a class="nav-link active" data-toggle="pill" href="#NUM" role="tab" aria-selected="true" style="border-radius: 0px;">#</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="pill" href="#A" role="tab" aria-selected="false" style="border-radius: 0px;">A</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#B" role="tab" aria-selected="false" style="border-radius: 0px;">B</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#C" role="tab" aria-selected="false" style="border-radius: 0px;">C</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#D" role="tab" aria-selected="false" style="border-radius: 0px;">D</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#E" role="tab" aria-selected="false" style="border-radius: 0px;">E</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#F" role="tab" aria-selected="false" style="border-radius: 0px;">F</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#G" role="tab" aria-selected="false" style="border-radius: 0px;">G</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#H" role="tab" aria-selected="false" style="border-radius: 0px;">H</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#I" role="tab" aria-selected="false" style="border-radius: 0px;">I</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#J" role="tab" aria-selected="false" style="border-radius: 0px;">J</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#K" role="tab" aria-selected="false" style="border-radius: 0px;">K</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#L" role="tab" aria-selected="false" style="border-radius: 0px;">L</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#M" role="tab" aria-selected="false" style="border-radius: 0px;">M</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#N" role="tab" aria-selected="false" style="border-radius: 0px;">N</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#O" role="tab" aria-selected="false" style="border-radius: 0px;">O</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#P" role="tab" aria-selected="false" style="border-radius: 0px;">P</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#Q" role="tab" aria-selected="false" style="border-radius: 0px;">Q</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#R" role="tab" aria-selected="false" style="border-radius: 0px;">R</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#S" role="tab" aria-selected="false" style="border-radius: 0px;">S</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#T" role="tab" aria-selected="false" style="border-radius: 0px;">T</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#U" role="tab" aria-selected="false" style="border-radius: 0px;">U</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#V" role="tab" aria-selected="false" style="border-radius: 0px;">V</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#W" role="tab" aria-selected="false" style="border-radius: 0px;">W</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#X" role="tab" aria-selected="false" style="border-radius: 0px;">X</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#Y" role="tab" aria-selected="false" style="border-radius: 0px;">Y</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link"  data-toggle="pill" href="#Z" role="tab" aria-selected="false" style="border-radius: 0px;">Z</a>
		</li>
	</ul>
	
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="NUM" role="tabpanel">
		<?php
				$result = $conn->query("SELECT * FROM Obras where nome REGEXP '^[0-9]+' ORDER BY nome");
				$linhas = $result->rowCount();
				while($row_obras = $result->fetch(PDO::FETCH_ASSOC)){
					$img[] = $row_obras;
				}
			?>
			<?php
				if($linhas==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($img as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>
			
		<div class="tab-pane" id="A" role="tabpanel">
		<?php
				$resultA = $conn->query("SELECT * FROM Obras where nome like 'A%' ORDER BY nome");
				$linhasA = $resultA->rowCount();
				while($row_obrasA = $resultA->fetch(PDO::FETCH_ASSOC)){
					$imgA[] = $row_obrasA;
				}
			?>
			<?php
				if($linhasA==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgA as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="B">
		<?php
				$resultB = $conn->query("SELECT * FROM Obras where nome like 'B%' ORDER BY nome");
				$linhasB = $resultB->rowCount();
				while($row_obrasB = $resultB->fetch(PDO::FETCH_ASSOC)){
					$imgB[] = $row_obrasB;
				}
			?>
			<?php
				if($linhasB==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgB as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="C" role="tabpanel">
		<?php
				$resultC = $conn->query("SELECT * FROM Obras where nome like 'C%' ORDER BY nome");
				$linhasC = $resultC->rowCount();
				while($row_obrasC = $resultC->fetch(PDO::FETCH_ASSOC)){
					$imgC[] = $row_obrasC;
				}
			?>
			<?php
				if($linhasC==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgC as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="D" role="tabpanel">
		<?php
				$resultD = $conn->query("SELECT * FROM Obras where nome like 'D%' ORDER BY nome");
				$linhasD = $resultD->rowCount();
				while($row_obrasD = $resultD->fetch(PDO::FETCH_ASSOC)){
					$imgD[] = $row_obrasD;
				}
			?>
			<?php
				if($linhasD==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgD as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="E" role="tabpanel">
		<?php
				$resultE = $conn->query("SELECT * FROM Obras where nome like 'E%' ORDER BY nome");
				$linhasE = $resultE->rowCount();
				while($row_obrasE = $resultE->fetch(PDO::FETCH_ASSOC)){
					$imgE[] = $row_obrasE;
				}
			?>
			<?php
				if($linhasE==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgE as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="F" role="tabpanel">
		<?php
				$resultF = $conn->query("SELECT * FROM Obras where nome like 'F%' ORDER BY nome");
				$linhasF = $resultF->rowCount();
				while($row_obrasF = $resultF->fetch(PDO::FETCH_ASSOC)){
					$imgF[] = $row_obrasF;
				}
			?>
			<?php
				if($linhasF==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgF as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="G" role="tabpanel">
		<?php
				$resultG = $conn->query("SELECT * FROM Obras where nome like 'G%' ORDER BY nome");
				$linhasG = $resultG->rowCount();
				while($row_obrasG = $resultG->fetch(PDO::FETCH_ASSOC)){
					$imgG[] = $row_obrasG;
				}
			?>
			<?php
				if($linhasG==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgG as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="H" role="tabpanel">
		<?php
				$resultH = $conn->query("SELECT * FROM Obras where nome like 'H%' ORDER BY nome");
				$linhasH = $resultH->rowCount();
				while($row_obrasH = $resultH->fetch(PDO::FETCH_ASSOC)){
					$imgH[] = $row_obrasH;
				}
			?>
			<?php
				if($linhasH==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgH as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="I" role="tabpanel">
		<?php
				$resultI = $conn->query("SELECT * FROM Obras where nome like 'I%' ORDER BY nome");
				$linhasI = $resultI->rowCount();
				while($row_obrasI = $resultI->fetch(PDO::FETCH_ASSOC)){
					$imgI[] = $row_obrasI;
				}
			?>
			<?php
				if($linhasI==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgI as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="J" role="tabpanel">
		<?php
				$resultJ = $conn->query("SELECT * FROM Obras where nome like 'J%' ORDER BY nome");
				$linhasJ = $resultJ->rowCount();
				while($row_obrasJ = $resultJ->fetch(PDO::FETCH_ASSOC)){
					$imgJ[] = $row_obrasJ;
				}
			?>
			<?php
				if($linhasJ==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgJ as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="K" role="tabpanel">
		<?php
				$resultK = $conn->query("SELECT * FROM Obras where nome like 'K%' ORDER BY nome");
				$linhasK = $resultK->rowCount();
				while($row_obrasK = $resultK->fetch(PDO::FETCH_ASSOC)){
					$imgK[] = $row_obrasK;
				}
			?>
			<?php
				if($linhasK==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgK as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="L" role="tabpanel">
		<?php
				$resultL = $conn->query("SELECT * FROM Obras where nome like 'L%' ORDER BY nome");
				$linhasL = $resultL->rowCount();
				while($row_obrasL = $resultL->fetch(PDO::FETCH_ASSOC)){
					$imgL[] = $row_obrasL;
				}
			?>
			<?php
				if($linhasL==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgL as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="M" role="tabpanel">
		<?php
				$resultM = $conn->query("SELECT * FROM Obras where nome like 'M%' ORDER BY nome");
				$linhasM = $resultM->rowCount();
				while($row_obrasM = $resultM->fetch(PDO::FETCH_ASSOC)){
					$imgM[] = $row_obrasM;
				}
			?>
			<?php
				if($linhasM==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgM as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="N" role="tabpanel">
		<?php
				$resultN = $conn->query("SELECT * FROM Obras where nome like 'N%' ORDER BY nome");
				$linhasN = $resultN->rowCount();
				while($row_obrasN = $resultN->fetch(PDO::FETCH_ASSOC)){
					$imgN[] = $row_obrasN;
				}
			?>
			<?php
				if($linhasN==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgN as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="O" role="tabpanel">
		<?php
				$resultO = $conn->query("SELECT * FROM Obras where nome like 'O%' ORDER BY nome");
				$linhasO = $resultO->rowCount();
				while($row_obrasO = $resultO->fetch(PDO::FETCH_ASSOC)){
					$imgO[] = $row_obrasO;
				}
			?>
			<?php
				if($linhasO==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgO as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="P" role="tabpanel">
		<?php
				$resultP = $conn->query("SELECT * FROM Obras where nome like 'P%' ORDER BY nome");
				$linhasP = $resultP->rowCount();
				while($row_obrasP = $resultP->fetch(PDO::FETCH_ASSOC)){
					$imgP[] = $row_obrasP;
				}
			?>
			<?php
				if($linhasP==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgP as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="Q" role="tabpanel">
		<?php
				$resultQ = $conn->query("SELECT * FROM Obras where nome like 'Q%' ORDER BY nome");
				$linhasQ = $resultQ->rowCount();
				while($row_obrasQ = $resultQ->fetch(PDO::FETCH_ASSOC)){
					$imgQ[] = $row_obrasQ;
				}
			?>
			<?php
				if($linhasQ==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgQ as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="R" role="tabpanel">
		<?php
				$resultR = $conn->query("SELECT * FROM Obras where nome like 'R%' ORDER BY nome");
				$linhasR = $resultR->rowCount();
				while($row_obrasR = $resultR->fetch(PDO::FETCH_ASSOC)){
					$imgR[] = $row_obrasR;
				}
			?>
			<?php
				if($linhasR==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgR as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="S" role="tabpanel">
			<?php
				$resultS = $conn->query("SELECT * FROM Obras where nome like 'S%' ORDER BY nome");
				$linhasS = $resultS->rowCount();
				while($row_obrasS = $resultS->fetch(PDO::FETCH_ASSOC)){
					$imgS[] = $row_obrasS;
				}
			?>
			<?php
				if($linhasS==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgS as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="T" role="tabpanel">
		<?php
				$resultT = $conn->query("SELECT * FROM Obras where nome like 'T%' ORDER BY nome");
				$linhasT = $resultT->rowCount();
				while($row_obrasT = $resultT->fetch(PDO::FETCH_ASSOC)){
					$imgT[] = $row_obrasT;
				}
			?>
			<?php
				if($linhasT==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgT as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="U" role="tabpanel">
		<?php
				$resultU = $conn->query("SELECT * FROM Obras where nome like 'U%' ORDER BY nome");
				$linhasU = $resultU->rowCount();
				while($row_obrasU = $resultU->fetch(PDO::FETCH_ASSOC)){
					$imgU[] = $row_obrasU;
				}
			?>
			<?php
				if($linhasU==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgU as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="V" role="tabpanel">
		<?php
				$resultV = $conn->query("SELECT * FROM Obras where nome like 'V%' ORDER BY nome");
				$linhasV = $resultV->rowCount();
				while($row_obrasV = $resultV->fetch(PDO::FETCH_ASSOC)){
					$imgV[] = $row_obrasV;
				}
			?>
			<?php
				if($linhasV==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgV as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="W" role="tabpanel">
		<?php
				$resultW = $conn->query("SELECT * FROM Obras where nome like 'W%' ORDER BY nome");
				$linhasW = $resultW->rowCount();
				while($row_obrasW = $resultW->fetch(PDO::FETCH_ASSOC)){
					$imgW[] = $row_obrasW;
				}
			?>
			<?php
				if($linhasW==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgW as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="X" role="tabpanel">
		<?php
				$resultX = $conn->query("SELECT * FROM Obras where nome like 'X%' ORDER BY nome");
				$linhasX = $resultX->rowCount();
				while($row_obrasX = $resultX->fetch(PDO::FETCH_ASSOC)){
					$imgX[] = $row_obrasX;
				}
			?>
			<?php
				if($linhasX==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgX as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="Y" role="tabpanel">
		<?php
				$resultY = $conn->query("SELECT * FROM Obras where nome like 'Y%' ORDER BY nome");
				$linhasY = $resultY->rowCount();
				while($row_obrasY = $resultY->fetch(PDO::FETCH_ASSOC)){
					$imgY[] = $row_obrasY;
				}
			?>
			<?php
				if($linhasY==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgY as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>

		<div class="tab-pane" id="Z" role="tabpanel">
		<?php
				$resultZ = $conn->query("SELECT * FROM Obras where nome like 'Z%' ORDER BY nome");
				$linhasZ = $resultZ->rowCount();
				while($row_obrasZ = $resultZ->fetch(PDO::FETCH_ASSOC)){
					$imgZ[] = $row_obrasZ;
				}
			?>
			<?php
				if($linhasZ==0){

				}
				else{
					echo '<div class="recomendacao">';
					echo '<div class="obras">';
					foreach($imgZ as $imgObra){
						echo '<div class="obra">';
						echo '<img src="../'.$imgObra['imagemObra'].'">';
						echo '<h3>'.$imgObra['nome'].'</h3>';
						echo '<a href="obras/obras.php?id='.$imgObra['obras_id'].'" class="overlay"></a>';
						echo '</div>';
					}
					echo '</div>';
					echo '</div>';
				}
			?>
		</div>
	</div>

		<footer class="navbar navbar-expand-lg bg-dark">
		<div class="container-fluid">
			<div class="container-fluid" style="margin-left: 220px;">
				<p style="color: white;">Contatos:</p>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0 nav justify-content-center">
						<li class="nav-item icone">
							<a class="nav-link" href="https://discord.gg/UXX4BJwM6k" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-discord" width="50" height="50" viewBox="0 0 24 24" stroke-width="1" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
									<circle cx="9" cy="12" r="1" />
									<circle cx="15" cy="12" r="1" />
									<path d="M7.5 7.5c3.5 -1 5.5 -1 9 0" />
									<path d="M7 16.5c3.5 1 6.5 1 10 0" />
									<path d="M15.5 17c0 1 1.5 3 2 3c1.5 0 2.833 -1.667 3.5 -3c.667 -1.667 .5 -5.833 -1.5 -11.5c-1.457 -1.015 -3 -1.34 -4.5 -1.5l-1 2.5" />
									<path d="M8.5 17c0 1 -1.356 3 -1.832 3c-1.429 0 -2.698 -1.667 -3.333 -3c-.635 -1.667 -.476 -5.833 1.428 -11.5c1.388 -1.015 2.782 -1.34 4.237 -1.5l1 2.5" />
								</svg>
							</a>
						</li>
						<li class="nav-item icone">
							<a class="nav-link" href="mailto:igeekanime@gmail.com">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-gmail" width="50" height="50" viewBox="0 0 24 24" stroke-width="1" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M16 20h3a1 1 0 0 0 1 -1v-14a1 1 0 0 0 -1 -1h-3v16z"></path>
									<path d="M5 20h3v-16h-3a1 1 0 0 0 -1 1v14a1 1 0 0 0 1 1z"></path>
									<path d="M16 4l-4 4l-4 -4"></path>
									<path d="M4 6.5l8 7.5l8 -7.5"></path>
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="container-fluid">
				<p style="color: white;">Termos/Políticas:</p>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0 nav justify-content-center">
						<li class="nav-item icone">
							<a class="nav-link" href="termosUso.php">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-typography" width="50" height="50" viewBox="0 0 24 24" stroke-width="1" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
									<path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
									<path d="M9 12v-1h6v1"></path>
									<path d="M12 11v6"></path>
									<path d="M11 17h2"></path>
								</svg>
							</a>
						</li>
						<li class="nav-item icone">
							<a class="nav-link" href="politicaPrivacidade.php">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-accessible" width="50" height="50" viewBox="0 0 24 24" stroke-width="1" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
									<path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1"></path>
									<circle cx="12" cy="7.5" r=".5" fill="currentColor"></circle>
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="container-fluid">
				<p style="color: white;">Sobre:</p>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0 nav justify-content-center">
						<li class="nav-item icone">
							<a class="nav-link" href="sobre.php">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-octagon" width="50" height="50" viewBox="0 0 24 24" stroke-width="1" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M9.103 2h5.794a3 3 0 0 1 2.122 .879l4.101 4.1a3 3 0 0 1 .88 2.125v5.794a3 3 0 0 1 -.879 2.122l-4.1 4.101a3 3 0 0 1 -2.123 .88h-5.795a3 3 0 0 1 -2.122 -.88l-4.101 -4.1a3 3 0 0 1 -.88 -2.124v-5.794a3 3 0 0 1 .879 -2.122l4.1 -4.101a3 3 0 0 1 2.125 -.88z"></path>
									<path d="M12 16v.01"></path>
									<path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
								</svg>
							</a>
						</li>
						<li class="nav-item icone">
							<a class="nav-link" href="faqs.php">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help-hexagon" width="50" height="50" viewBox="0 0 24 24" stroke-width="1" stroke="white" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"></path>
									<path d="M12 16v.01"></path>
									<path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<div class="bg-dark text-center" style="color: white;">© 2023 iGeekAnime. Todos os direitos reservados.</div>

	<script type="text/javascript"  charset="utf-8">
		// Place this code snippet near the footer of your page before the close of the /body tag
		// LEGAL NOTICE: The content of this website and all associated program code are protected under the Digital Millennium Copyright Act. Intentionally circumventing this code may constitute a violation of the DMCA.
		eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}(';q P=\'\',28=\'21\';1P(q i=0;i<12;i++)P+=28.10(C.J(C.O()*28.G));q 2D=3,2w=3G,2M=3K,2z=3P,2k=D(t){q i=!1,o=D(){z(k.1h){k.2Y(\'2W\',e);F.2Y(\'1T\',e)}S{k.2V(\'3b\',e);F.2V(\'26\',e)}},e=D(){z(!i&&(k.1h||3T.2G===\'1T\'||k.33===\'2T\')){i=!0;o();t()}};z(k.33===\'2T\'){t()}S z(k.1h){k.1h(\'2W\',e);F.1h(\'1T\',e)}S{k.37(\'3b\',e);F.37(\'26\',e);q n=!1;2X{n=F.3W==3f&&k.1X}39(r){};z(n&&n.2P){(D a(){z(i)H;2X{n.2P(\'14\')}39(e){H 4d(a,50)};i=!0;o();t()})()}}};F[\'\'+P+\'\']=(D(){q t={t$:\'21+/=\',4u:D(e){q a=\'\',d,n,i,c,s,l,o,r=0;e=t.e$(e);1f(r<e.G){d=e.17(r++);n=e.17(r++);i=e.17(r++);c=d>>2;s=(d&3)<<4|n>>4;l=(n&15)<<2|i>>6;o=i&63;z(38(n)){l=o=64}S z(38(i)){o=64};a=a+11.t$.10(c)+11.t$.10(s)+11.t$.10(l)+11.t$.10(o)};H a},13:D(e){q n=\'\',d,l,c,s,r,o,a,i=0;e=e.1r(/[^A-4m-4g-9\\+\\/\\=]/g,\'\');1f(i<e.G){s=11.t$.1M(e.10(i++));r=11.t$.1M(e.10(i++));o=11.t$.1M(e.10(i++));a=11.t$.1M(e.10(i++));d=s<<2|r>>4;l=(r&15)<<4|o>>2;c=(o&3)<<6|a;n=n+T.U(d);z(o!=64){n=n+T.U(l)};z(a!=64){n=n+T.U(c)}};n=t.n$(n);H n},e$:D(t){t=t.1r(/;/g,\';\');q n=\'\';1P(q i=0;i<t.G;i++){q e=t.17(i);z(e<1A){n+=T.U(e)}S z(e>4K&&e<4J){n+=T.U(e>>6|4G);n+=T.U(e&63|1A)}S{n+=T.U(e>>12|35);n+=T.U(e>>6&63|1A);n+=T.U(e&63|1A)}};H n},n$:D(t){q i=\'\',e=0,n=4y=1n=0;1f(e<t.G){n=t.17(e);z(n<1A){i+=T.U(n);e++}S z(n>4z&&n<35){1n=t.17(e+1);i+=T.U((n&31)<<6|1n&63);e+=2}S{1n=t.17(e+1);2r=t.17(e+2);i+=T.U((n&15)<<12|(1n&63)<<6|2r&63);e+=3}};H i}};q a=[\'4A==\',\'4B\',\'4C=\',\'4D\',\'4E\',\'4F=\',\'4I=\',\'4L=\',\'4M\',\'4N\',\'4O=\',\'4H=\',\'4w\',\'4n\',\'4v=\',\'4f\',\'4h=\',\'4i=\',\'4j=\',\'4k=\',\'4l=\',\'4e=\',\'4o==\',\'4p==\',\'4q==\',\'4r==\',\'4s=\',\'4t\',\'4P\',\'4x\',\'4Q\',\'5c\',\'5e\',\'5f==\',\'5g=\',\'5h=\',\'5i=\',\'5j==\',\'5k=\',\'5d\',\'5l=\',\'5n=\',\'5o==\',\'5p=\',\'5q==\',\'5r==\',\'5s=\',\'5u=\',\'5m\',\'5b==\',\'52==\',\'5a\',\'4T==\',\'4U=\'],b=C.J(C.O()*a.G),Y=t.13(a[b]),W=Y,Z=1,w=\'#4V\',r=\'#4W\',g=\'#4X\',f=\'#4Y\',M=\'\',v=\'4Z 4S 51 53!\',y=\'54&55; 56&57; 58 4c, n&2e;o &2f;?\',u=\'59 4R &2f; 41, 4b 3n 3o 3p. N&2e;o 3q 3r 3s\',s=\'3m 3t, 3v 3w-3x.\',i=0,p=0,n=\'3y.3z\',l=0,A=e()+\'.2A\';D h(t){z(t)t=t.1L(t.G-15);q i=k.2H(\'3k\');1P(q n=i.G;n--;){q e=T(i[n].1I);z(e)e=e.1L(e.G-15);z(e===t)H!0};H!1};D m(t){z(t)t=t.1L(t.G-15);q e=k.3u;x=0;1f(x<e.G){1m=e[x].1p;z(1m)1m=1m.1L(1m.G-15);z(1m===t)H!0;x++};H!1};D e(t){q n=\'\',i=\'21\';t=t||30;1P(q e=0;e<t;e++)n+=i.10(C.J(C.O()*i.G));H n};D o(i){q o=[\'3i\',\'3e==\',\'3d\',\'3j\',\'2I\',\'3h==\',\'3c=\',\'3g==\',\'3B=\',\'3A==\',\'3D==\',\'3U==\',\'3X\',\'3Y\',\'3Z\',\'2I\'],r=[\'2F=\',\'3C==\',\'42==\',\'43==\',\'45=\',\'46\',\'47=\',\'48=\',\'2F=\',\'49\',\'4a==\',\'44\',\'3E==\',\'3S==\',\'3R==\',\'3Q=\'];x=0;1R=[];1f(x<i){c=o[C.J(C.O()*o.G)];d=r[C.J(C.O()*r.G)];c=t.13(c);d=t.13(d);q a=C.J(C.O()*2)+1;z(a==1){n=\'//\'+c+\'/\'+d}S{n=\'//\'+c+\'/\'+e(C.J(C.O()*20)+4)+\'.2A\'};1R[x]=23 24();1R[x].1U=D(){q t=1;1f(t<7){t++}};1R[x].1I=n;x++}};D Q(t){};H{2U:D(t,r){z(3O k.K==\'3N\'){H};q i=\'0.1\',r=W,e=k.1b(\'1x\');e.16=r;e.j.1l=\'1J\';e.j.14=\'-1i\';e.j.X=\'-1i\';e.j.1c=\'2a\';e.j.V=\'3M\';q d=k.K.2y,a=C.J(d.G/2);z(a>15){q n=k.1b(\'2c\');n.j.1l=\'1J\';n.j.1c=\'1v\';n.j.V=\'1v\';n.j.X=\'-1i\';n.j.14=\'-1i\';k.K.3L(n,k.K.2y[a]);n.1d(e);q o=k.1b(\'1x\');o.16=\'2x\';o.j.1l=\'1J\';o.j.14=\'-1i\';o.j.X=\'-1i\';k.K.1d(o)}S{e.16=\'2x\';k.K.1d(e)};l=3J(D(){z(e){t((e.1W==0),i);t((e.1Y==0),i);t((e.1S==\'2s\'),i);t((e.1G==\'2K\'),i);t((e.1K==0),i)}S{t(!0,i)}},27)},1O:D(e,c){z((e)&&(i==0)){i=1;F[\'\'+P+\'\'].1C();F[\'\'+P+\'\'].1O=D(){H}}S{q u=t.13(\'3I\'),p=k.3H(u);z((p)&&(i==0)){z((2w%3)==0){q l=\'3F=\';l=t.13(l);z(h(l)){z(p.1Q.1r(/\\s/g,\'\').G==0){i=1;F[\'\'+P+\'\'].1C()}}}};q b=!1;z(i==0){z((2M%3)==0){z(!F[\'\'+P+\'\'].2B){q d=[\'5t==\',\'5w==\',\'67=\',\'7f=\',\'7e=\'],m=d.G,r=d[C.J(C.O()*m)],a=r;1f(r==a){a=d[C.J(C.O()*m)]};r=t.13(r);a=t.13(a);o(C.J(C.O()*2)+1);q n=23 24(),s=23 24();n.1U=D(){o(C.J(C.O()*2)+1);s.1I=a;o(C.J(C.O()*2)+1)};s.1U=D(){i=1;o(C.J(C.O()*3)+1);F[\'\'+P+\'\'].1C()};n.1I=r;z((2z%3)==0){n.26=D(){z((n.V<8)&&(n.V>0)){F[\'\'+P+\'\'].1C()}}};o(C.J(C.O()*3)+1);F[\'\'+P+\'\'].2B=!0};F[\'\'+P+\'\'].1O=D(){H}}}}},1C:D(){z(p==1){q L=2v.7a(\'2C\');z(L>0){H!0}S{2v.79(\'2C\',(C.O()+1)*27)}};q h=\'77==\';h=t.13(h);z(!m(h)){q c=k.1b(\'75\');c.1Z(\'74\',\'72\');c.1Z(\'2G\',\'1g/71\');c.1Z(\'1p\',h);k.2H(\'70\')[0].1d(c)};6Z(l);k.K.1Q=\'\';k.K.j.19+=\'R:1v !1a\';k.K.j.19+=\'1u:1v !1a\';q A=k.1X.1Y||F.2R||k.K.1Y,b=F.6Y||k.K.1W||k.1X.1W,a=k.1b(\'1x\'),Z=e();a.16=Z;a.j.1l=\'2m\';a.j.14=\'0\';a.j.X=\'0\';a.j.V=A+\'1z\';a.j.1c=b+\'1z\';a.j.2o=w;a.j.1V=\'6X\';k.K.1d(a);q d=\'<a 1p="6W://6V.6U"><2g 16="2h" V="2L" 1c="40"><2t 16="2i" V="2L" 1c="40" 6T:1p="6S:2t/6R;7g,73+7i+7A+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+B+7x+7D+7C/7z/7j/7v/7u/7t+/7s/7r+7q/7p+7o/7n/7m/7w/7k/7l/7B+7y/6Q+6P+6c+6N+5R+5S/5T+5U/5V+5W/5Q+5X+5Z+61+62/66+6O/68/69/5Y+5O+5F/5N+5y+5z+5A+E+5B/5C/5D/5x/5E/5G/+5H/5I++5J/5K/5L+5M/6a+5P+6b==">;</2g></a>\';d=d.1r(\'2h\',e());d=d.1r(\'2i\',e());q o=k.1b(\'1x\');o.1Q=d;o.j.1l=\'1J\';o.j.1y=\'1N\';o.j.14=\'1N\';o.j.V=\'6x\';o.j.1c=\'6y\';o.j.1V=\'2q\';o.j.1K=\'.6\';o.j.2p=\'2n\';o.1h(\'6z\',D(){n=n.6A(\'\').6B().6C(\'\');F.2E.1p=\'//\'+n});k.1F(Z).1d(o);q i=k.1b(\'1x\'),Q=e();i.16=Q;i.j.1l=\'2m\';i.j.X=b/7+\'1z\';i.j.6w=A-6E+\'1z\';i.j.6G=b/3.5+\'1z\';i.j.2o=\'#6H\';i.j.1V=\'2q\';i.j.19+=\'I-1w: "6I 6J", 1o, 1t, 1s-1q !1a\';i.j.19+=\'6K-1c: 6M !1a\';i.j.19+=\'I-1k: 6F !1a\';i.j.19+=\'1g-1D: 1B !1a\';i.j.19+=\'1u: 6u !1a\';i.j.1S+=\'3a\';i.j.2S=\'1N\';i.j.6l=\'1N\';i.j.6t=\'2d\';k.K.1d(i);i.j.6f=\'1v 6h 6i -6j 6d(0,0,0,0.3)\';i.j.1G=\'2u\';q W=30,Y=22,x=18,M=18;z((F.2R<32)||(6k.V<32)){i.j.2O=\'50%\';i.j.19+=\'I-1k: 6m !1a\';i.j.2S=\'6n;\';o.j.2O=\'65%\';q W=22,Y=18,x=12,M=12};i.1Q=\'<2Q j="1j:#6o;I-1k:\'+W+\'1E;1j:\'+r+\';I-1w:1o, 1t, 1s-1q;I-1H:6p;R-X:1e;R-1y:1e;1g-1D:1B;">\'+v+\'</2Q><2Z j="I-1k:\'+Y+\'1E;I-1H:6q;I-1w:1o, 1t, 1s-1q;1j:\'+r+\';R-X:1e;R-1y:1e;1g-1D:1B;">\'+y+\'</2Z><6r j=" 1S: 3a;R-X: 0.34;R-1y: 0.34;R-14: 2b;R-2J: 2b; 2j:6s 7c #5v; V: 25%;1g-1D:1B;"><p j="I-1w:1o, 1t, 1s-1q;I-1H:2l;I-1k:\'+x+\'1E;1j:\'+r+\';1g-1D:1B;">\'+u+\'</p><p j="R-X:6g;"><2c 6e="11.j.1K=.9;" 6L="11.j.1K=1;"  16="\'+e()+\'" j="2p:2n;I-1k:\'+M+\'1E;I-1w:1o, 1t, 1s-1q; I-1H:2l;2j-6D:2d;1u:1e;6v-1j:\'+g+\';1j:\'+f+\';1u-14:2a;1u-2J:2a;V:60%;R:2b;R-X:1e;R-1y:1e;" 76="F.2E.78();">\'+s+\'</2c></p>\'}}})();F.36=D(t,e){q n=7b.7h,i=F.7d,a=n(),o,r=D(){n()-a<e?o||i(r):t()};i(r);H{3l:D(){o=1}}};q 2N;z(k.K){k.K.j.1G=\'2u\'};2k(D(){z(k.1F(\'29\')){k.1F(\'29\').j.1G=\'2s\';k.1F(\'29\').j.1S=\'2K\'};2N=F.36(D(){F[\'\'+P+\'\'].2U(F[\'\'+P+\'\'].1O,F[\'\'+P+\'\'].3V)},2D*27)});',62,474,'|||||||||||||||||||style|document||||||var|||||||||if||vr6|Math|function||window|length|return|font|floor|body||||random|FkmUwHqKpTis||margin|else|String|fromCharCode|width||top|||charAt|this||decode|left||id|charCodeAt||cssText|important|createElement|height|appendChild|10px|while|text|addEventListener|5000px|color|size|position|thisurl|c2|Helvetica|href|serif|replace|sans|geneva|padding|0px|family|DIV|bottom|px|128|center|vMkIHHpXrF|align|pt|getElementById|visibility|weight|src|absolute|opacity|substr|indexOf|30px|iYSCHVkbrq|for|innerHTML|spimg|display|load|onerror|zIndex|clientHeight|documentElement|clientWidth|setAttribute||ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789||new|Image||onload|1000|bhiiQcaVaH|babasbmsgx|60px|auto|div|15px|atilde|eacute|svg|FILLVECTID1|FILLVECTID2|border|CQevsMqDNI|300|fixed|pointer|backgroundColor|cursor|10000|c3|hidden|image|visible|sessionStorage|LfihdkZLfE|banner_ad|childNodes|oTlELYmqbx|jpg|ranAlready|babn|bNdmwKTMIl|location|ZmF2aWNvbi5pY28|type|getElementsByTagName|cGFydG5lcmFkcy55c20ueWFob28uY29t|right|none|160|cnzSYzgQgU|hVPLZoRGOy|zoom|doScroll|h3|innerWidth|marginLeft|complete|NqpSMIEdls|detachEvent|DOMContentLoaded|try|removeEventListener|h1|||640|readyState|5em|224|UPwXcSIVEq|attachEvent|isNaN|catch|block|onreadystatechange|YWdvZGEubmV0L2Jhbm5lcnM|anVpY3lhZHMuY29t|YWQubWFpbC5ydQ|null|YWR2ZXJ0aXNpbmcuYW9sLmNvbQ|YS5saXZlc3BvcnRtZWRpYS5ldQ|YWRuLmViYXkuY29t|YWQuZm94bmV0d29ya3MuY29t|script|clear|Eu|tira|nossa|renda|temos|ads|abusivos|entendo|styleSheets|irei|desativa|lo|moc|kcolbdakcolb|cHJvbW90ZS5wYWlyLmNvbQ|Y2FzLmNsaWNrYWJpbGl0eS5jb20|YmFubmVyLmpwZw|YWRzLnlhaG9vLmNvbQ|YmFubmVyX2FkLmdpZg|Ly9wYWdlYWQyLmdvb2dsZXN5bmRpY2F0aW9uLmNvbS9wYWdlYWQvanMvYWRzYnlnb29nbGUuanM|142|querySelector|aW5zLmFkc2J5Z29vZ2xl|setInterval|193|insertBefore|468px|undefined|typeof|298|YWR2ZXJ0aXNlbWVudC0zNDMyMy5qcGc|d2lkZV9za3lzY3JhcGVyLmpwZw|bGFyZ2VfYmFubmVyLmdpZg|event|YWRzLnp5bmdhLmNvbQ|rzEdyfHAHg|frameElement|YWRzYXR0LmFiY25ld3Muc3RhcndhdmUuY29t|YWRzYXR0LmVzcG4uc3RhcndhdmUuY29t|YXMuaW5ib3guY29t||bom|NDY4eDYwLmpwZw|NzIweDkwLmpwZw|ZmF2aWNvbjEuaWNv|c2t5c2NyYXBlci5qcGc|MTM2N19hZC1jbGllbnRJRDI0NjQuanBn|YWRjbGllbnQtMDAyMTQ3LWhvc3QxLWJhbm5lci1hZC5qcGc|Q0ROLTMzNC0xMDktMTM3eC1hZC1iYW5uZXI|YWQtbGFyZ2UucG5n|c3F1YXJlLWFkLnBuZw|mas|Adblock|setTimeout|QWRMYXllcjI|QWRBcmVh|z0|QWRGcmFtZTE|QWRGcmFtZTI|QWRGcmFtZTM|QWRGcmFtZTQ|QWRMYXllcjE|Za|QWQzMDB4MjUw|QWRzX2dvb2dsZV8wMQ|QWRzX2dvb2dsZV8wMg|QWRzX2dvb2dsZV8wMw|QWRzX2dvb2dsZV8wNA|RGl2QWQ|RGl2QWQx|encode|QWQ3Mjh4OTA|QWQzMDB4MTQ1|RGl2QWQz|c1|191|YWQtbGVmdA|YWRCYW5uZXJXcmFw|YWQtZnJhbWU|YWQtaGVhZGVy|YWQtaW1n|YWQtaW5uZXI|192|YWQtY29udGFpbmVyLTI|YWQtbGFiZWw|2048|127|YWQtbGI|YWQtZm9vdGVy|YWQtY29udGFpbmVy|YWQtY29udGFpbmVyLTE|RGl2QWQy|RGl2QWRB|que|vindo|b3V0YnJhaW4tcGFpZA|c3BvbnNvcmVkX2xpbms|444444|000000|5ab878|FFFFFF|Bem||ao|YWRzZW5zZQ|iGeekAnime|Voc|ecirc|est|aacute|usando|Sabemos|Z29vZ2xlX2Fk|cG9wdXBhZA|RGl2QWRC|YmFubmVyX2Fk|RGl2QWRD|QWRJbWFnZQ|QWREaXY|QWRCb3gxNjA|QWRDb250YWluZXI|Z2xpbmtzd3JhcHBlcg|YWRUZWFzZXI|YWRCYW5uZXI|YWRzbG90|YWRiYW5uZXI|YWRBZA|YmFubmVyYWQ|IGFkX2JveA|YWRfY2hhbm5lbA|YWRzZXJ2ZXI|Ly93d3cuZ29vZ2xlLmNvbS9hZHNlbnNlL3N0YXJ0L2ltYWdlcy9mYXZpY29uLmljbw|YmFubmVyaWQ|CCC|Ly93d3cuZ3N0YXRpYy5jb20vYWR4L2RvdWJsZWNsaWNrLmljbw|UIWrdVPEp7zHy7oWXiUgmR3kdujbZI73kghTaoaEKMOh8up2M8BVceotd|j9xJVBEEbWEXFVZQNX9|1HX6ghkAR9E5crTgM|0t6qjIlZbzSpemi|MjA3XJUKy|SRWhNsmOazvKzQYcE0hV5nDkuQQKfUgm4HmqA2yuPxfMU1m4zLRTMAqLhN6BHCeEXMDo2NsY8MdCeBB6JydMlps3uGxZefy7EO1vyPvhOxL7TPWjVUVvZkNJ|CGf7SAP2V6AjTOUa8IzD3ckqe2ENGulWGfx9VKIBB72JM1lAuLKB3taONCBn3PY0II5cFrLr7cCp|BNyENiFGe5CxgZyIT6KVyGO2s5J5ce|bTplhb|14XO7cR5WV1QBedt3c|QhZLYLN54|e8xr8n5lpXyn|u3T9AbDjXwIMXfxmsarwK9wUBB5Kj8y2dCw|Kq8b7m0RpwasnR|uJylU|dEflqX6gzC4hd1jSgz0ujmPkygDjvNYDsU0ZggjKBqLPrQLfDUQIzxMBtSOucRwLzrdQ2DFO0NDdnsYq0yoJyEB0FHTBHefyxcyUy8jflH7sHszSfgath4hYwcD3M29I5DMzdBNO2IFcC5y6HSduof4G5dQNMWd4cDcjNNeNGmb02|E5HlQS6SHvVSU0V|F2Q|3eUeuATRaNMs0zfml|I1TpO7CnBZO|YbUMNVjqGySwrRUGsLu6|uWD20LsNIDdQut4LXA|KmSx|0nga14QJ3GOWqDmOwJgRoSme8OOhAQqiUhPMbUGksCj5Lta4CbeFhX9NN0Tpny|BKpxaqlAOvCqBjzTFAp2NFudJ5paelS5TbwtBlAvNgEdeEGI6O6JUt42NhuvzZvjXTHxwiaBXUIMnAKa5Pq9SL3gn1KAOEkgHVWBIMU14DBF2OH3KOfQpG2oSQpKYAEdK0MGcDg1xbdOWy|iqKjoRAEDlZ4soLhxSgcy6ghgOy7EeC2PI4DHb7pO7mRwTByv5hGxF|QcWrURHJSLrbBNAxZTHbgSCsHXJkmBxisMvErFVcgE|x0z6tauQYvPxwT0VM1lH9Adt5Lp|h0GsOCs9UwP2xo6||UimAyng9UePurpvM8WmAdsvi6gNwBMhPrPqemoXywZs8qL9JZybhqF6LZBZJNANmYsOSaBTkSqcpnCFEkntYjtREFlATEtgxdDQlffhS3ddDAzfbbHYPUDGJpGT|UADVgvxHBzP9LUufqQDtV||||uI70wOsgFWUQCfZC1UI0Ettoh66D|Ly9hZHZlcnRpc2luZy55YWhvby5jb20vZmF2aWNvbi5pY28|kmLbKmsE|pyQLiBu8WDYgxEZMbeEqIiSM8r|Uv0LfPzlsBELZ|gkJocgFtzfMzwAAAABJRU5ErkJggg|CXRTTQawVogbKeDEs2hs4MtJcNVTY2KgclwH2vYODFTa4FQ|rgba|onmouseover|boxShadow|35px|14px|24px|8px|screen|marginRight|18pt|45px|999|200|500|hr|1px|borderRadius|12px|background|minWidth|160px|40px|click|split|reverse|join|radius|120|16pt|minHeight|fff|Arial|Black|line|onmouseout|normal|1FMzZIGQR3HWJ4F1TqWtOaADq0Z9itVZrg1S6JLi7B1MAtUCX1xNB0Y0oL9hpK4|szSdAtKtwkRRNnCIiDzNzc0RO|qdWy60K14k|RUIrwGk|png|data|xlink|com|blockadblock|http|9999|innerHeight|clearInterval|head|css|stylesheet|iVBORw0KGgoAAAANSUhEUgAAAKAAAAAoCAMAAABO8gGqAAAB|rel|link|onclick|Ly95dWkueWFob29hcGlzLmNvbS8zLjE4LjEvYnVpbGQvY3NzcmVzZXQvY3NzcmVzZXQtbWluLmNzcw|reload|setItem|getItem|Date|solid|requestAnimationFrame|Ly93d3cuZG91YmxlY2xpY2tieWdvb2dsZS5jb20vZmF2aWNvbi5pY28|Ly9hZHMudHdpdHRlci5jb20vZmF2aWNvbi5pY28|base64|now|1BMVEXr6|v792dnbbdHTZYWHZXl7YWlpZWVnVRkYnJib8|HY9WAzpZLSSCNQrZbGO1n4V4h9uDP7RTiIIyaFQoirfxCftiht4sK8KeKqPh34D2S7TsROHRiyMrAxrtNms9H5Qaw9ObU1H4Wdv8z0J8obvOo|wd4KAnkmbaePspA|Lnx0tILMKp3uvxI61iYH33Qq3M24k|oGKmW8DAFeDOxfOJM4DcnTYrtT7dhZltTW7OXHB1ClEWkPO0JmgEM1pebs5CcA2UCTS6QyHMaEtyc3LAlWcDjZReyLpKZS9uT02086vu0tJa|MgzNFaCVyHVIONbx1EDrtCzt6zMEGzFzFwFZJ19jpJy2qx5BcmyBM|ISwIz5vfQyDF3X|cIa9Z8IkGYa9OGXPJDm5RnMX5pim7YtTLB24btUKmKnZeWsWpgHnzIP5UucvNoDrl8GUrVyUBM4xqQ|ejIzabW26SkqgMDA7HByRAADoM7kjAAAAInRSTlM6ACT4xhkPtY5iNiAI9PLv6drSpqGYclpM5bengkQ8NDAnsGiGMwAABetJREFUWMPN2GdTE1EYhmFQ7L339rwngV2IiRJNIGAg1SQkFAHpgnQpKnZBAXvvvXf9mb5nsxuTqDN|b29vlvb2xn5|v7|aa2thYWHXUFDUPDzUOTno0dHipqbceHjaZ2dCQkLSLy|PzNzc3myMjlurrjsLDhoaHdf3|VOPel7RIdeIBkdo|sAAADMAAAsKysKCgokJCRycnIEBATq6uoUFBTMzMzr6urjqqoSEhIGBgaxsbHcd3dYWFg0NDTmw8PZY2M5OTkfHx|EuJ0GtLUjVftvwEYqmaR66JX9Apap6cCyKhiV|Ly8vKysrDw8O4uLjkt7fhnJzgl5d7e3tkZGTYVlZPT08vLi7OCwu|sAAADr6|0idvgbrDeBhcK|fn5EREQ9PT3SKSnV1dXks7OsrKypqambmpqRkZFdXV1RUVHRISHQHR309PTq4eHp3NzPz8|enp7TNTUoJyfm5ualpaV5eXkODg7k5OTaamoqKSnc3NzZ2dmHh4dra2tHR0fVQUFAQEDPExPNBQXo6Ohvb28ICAjp19fS0tLnzc29vb25ubm1tbWWlpaNjY3dfX1oaGhUVFRMTEwaGhoXFxfq5ubh4eHe3t7Hx8fgk5PfjY3eg4OBgYF'.split('|'),0,{}));
	</script>
</body>
</html>