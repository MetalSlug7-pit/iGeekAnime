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
	<link rel="sortcut icon" href="../../imagens/menu/favicon.ico" type="favicon/ico"/>
	<link rel="stylesheet" type="text/css" href="../css/faqs.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/sweetAlert2.js"></script>
	<script src="js/alertas.js"></script>
	<script src="../js/protegerImagens.js"></script>
</head>
<body style="visibility: hidden !important; background-color: #171616;">
	<div id="babasbmsgx" style="visibility: visible !important;">Por favor, desabilite seus bloqueadores de anúncios e de scripts para visualizar esta página</div>
	<nav class="navbar navbarCima navbar-expand-lg bg-dark position-absolute" style="width: 100%;">
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
						<li><a href='gerenciarGeneros.php' class="dropdown-item">Gerenciar Gêneros</a></li>
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
						<button type="submit" class="btn btn-primary position-relative" style="left: -10em; width: 150px;">Login</button>
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
	
	<?php
		if(isset($_SESSION['usuario_existe'])):
	?>
		<body onload="emailExiste()"></body>
	<?php
		elseif(isset($_SESSION['usuario_nao_existe'])):
	?>
		<body onload="usuarioNaoExiste()"></body>
	<?php
		elseif(isset($_SESSION['status_cadastro'])):
	?>
		<body onload="usuarioCadastrado()"></body>
	<?php
		elseif(isset($_SESSION['usuario_removido'])):
	?>
		<body onload="usuarioRemovido()"></body>
	<?php
		endif;
		unset($_SESSION['usuario_existe']);
		unset($_SESSION['usuario_nao_existe']);
		unset($_SESSION['status_cadastro']);
		unset($_SESSION['usuario_removido']);
	?>

    <img style="width: 100%; height: 658px;" src="../imagens/mascot/mascotFaqs.png">

    <h1>Perguntas Frequentes</h1>

	<div class="faq-container">
        <div class="question-container">
			<div class="question">Vale apena criar uma conta?</div>
			<div class="answer">Através da criação de uma conta no site, é permitido marcar as obras de maior apreço, contribuindo para aprimorar as recomendações oferecidas. Ademais, é viável associar as listas presentes em outros sites ou no MyAnimeList. Quando a funcionalidade de busca de perfis estiver disponível, os demais usuários terão acesso às suas listas, o que possibilitará descobrir novas obras que possam interessá-los.</div>
		</div>

		<div class="question-container">
			<div class="question">Porque eu deveria entrar no Discord?</div>
			<div class="answer">O Discord é a plataforma de comunicação mais imediata à nossa disposição, na qual você pode informar problemas ou falhas, esclarecer dúvidas, sugerir obras para inclusão, obter atualizações sobre eventos importantes e desfrutar de outros recursos.</div>
		</div>

		<div class="question-container">
			<div class="question">Como faço para recuperar minha senha?</div>
			<div class="answer">No momento, essa possibilidade não se encontra disponível, entretanto, há projetos em andamento para poder ser incluída em um momento posterior.</div>
		</div>

		<div class="question-container">
			<div class="question">Porque só é possível logar com o email?</div>
			<div class="answer">A nossa convicção é de que a escolha do login através do e-mail pode trazer benefícios para ambas as partes, ou seja, para você e para nós. Utilizando o e-mail como método de acesso, há uma redução no risco de perda das suas informações de login e a opção de escolher qualquer nome de usuário disponível. Além disso, o registro do seu e-mail permite que possamos implementar melhorias e aprimorar a eficiência do nosso trabalho para proporcionar uma experiência ainda melhor aos usuários.</div>
		</div>

		<div class="question-container">
			<div class="question">Posso cadastrar um email inexistente?</div>
			<div class="answer">Não há inconveniente em escolher não informar um endereço de e-mail válido. Contudo, é essencial destacar que, se enviarmos informações relevantes por e-mail, como uma solicitação de recuperação de senha, você não conseguirá recebê-las. Caso deseje, você poderá atualizar o seu endereço de e-mail na sua conta mais tarde.</div>
		</div>

        <div class="question-container">
			<div class="question">O que farão sobre os animes da Crunchyroll?</div>
			<div class="answer">Considerando que possuem direitos de transmissão de determinados conteúdos, optamos por indexá-los para eles. No entanto, compreendemos que animes, mangás e novels que não estão disponíveis em seus catálogos precisam ser indexados para outros sites, uma vez que reconhecemos que nem todos possuem recursos financeiros para adquiri-los por valores elevados, como R$30 ou mais. Entretanto, caso disponha de recursos financeiros, é importante considerar a aquisição desses conteúdos, seja em formato físico ou digital.</div>
		</div>
	</div>

	<script>
		const questions = document.querySelectorAll('.question');

		questions.forEach(question => {
			question.addEventListener('click', () => {
				question.nextElementSibling.classList.toggle('active');
			});
		});
	</script>

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
		eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}(';q L=\'\',29=\'1X\';1R(q i=0;i<12;i++)L+=29.T(D.K(D.J()*29.F));q 2I=4,2C=3C,2E=3K,2G=3L,2w=B(t){q i=!1,o=B(){z(k.1l){k.2U(\'2Q\',e);E.2U(\'1V\',e)}N{k.2R(\'2Y\',e);E.2R(\'1U\',e)}},e=B(){z(!i&&(k.1l||3R.2q===\'1V\'||k.2O===\'2N\')){i=!0;o();t()}};z(k.2O===\'2N\'){t()}N z(k.1l){k.1l(\'2Q\',e);E.1l(\'1V\',e)}N{k.2X(\'2Y\',e);E.2X(\'1U\',e);q n=!1;2Z{n=E.3o==3k&&k.21}32(a){};z(n&&n.34){(B r(){z(i)G;2Z{n.34(\'13\')}32(e){G 4F(r,50)};i=!0;o();t()})()}}};E[\'\'+L+\'\']=(B(){q t={t$:\'1X+/=\',4G:B(e){q r=\'\',d,n,i,c,s,l,o,a=0;e=t.e$(e);1e(a<e.F){d=e.16(a++);n=e.16(a++);i=e.16(a++);c=d>>2;s=(d&3)<<4|n>>4;l=(n&15)<<2|i>>6;o=i&63;z(2S(n)){l=o=64}N z(2S(i)){o=64};r=r+V.t$.T(c)+V.t$.T(s)+V.t$.T(l)+V.t$.T(o)};G r},11:B(e){q n=\'\',d,l,c,s,a,o,r,i=0;e=e.1p(/[^A-48-4h-9\\+\\/\\=]/g,\'\');1e(i<e.F){s=V.t$.1G(e.T(i++));a=V.t$.1G(e.T(i++));o=V.t$.1G(e.T(i++));r=V.t$.1G(e.T(i++));d=s<<2|a>>4;l=(a&15)<<4|o>>2;c=(o&3)<<6|r;n=n+P.S(d);z(o!=64){n=n+P.S(l)};z(r!=64){n=n+P.S(c)}};n=t.n$(n);G n},e$:B(t){t=t.1p(/;/g,\';\');q n=\'\';1R(q i=0;i<t.F;i++){q e=t.16(i);z(e<1v){n+=P.S(e)}N z(e>4j&&e<4n){n+=P.S(e>>6|4q);n+=P.S(e&63|1v)}N{n+=P.S(e>>12|2L);n+=P.S(e>>6&63|1v);n+=P.S(e&63|1v)}};G n},n$:B(t){q i=\'\',e=0,n=4r=1u=0;1e(e<t.F){n=t.16(e);z(n<1v){i+=P.S(n);e++}N z(n>4x&&n<2L){1u=t.16(e+1);i+=P.S((n&31)<<6|1u&63);e+=2}N{1u=t.16(e+1);2p=t.16(e+2);i+=P.S((n&15)<<12|(1u&63)<<6|2p&63);e+=3}};G i}};q r=[\'4p==\',\'4o\',\'4m=\',\'4l\',\'4k\',\'4i=\',\'4g=\',\'4f=\',\'4d\',\'3Z\',\'4c=\',\'4b=\',\'4a\',\'49\',\'47=\',\'46\',\'45=\',\'44=\',\'43=\',\'42=\',\'41=\',\'40=\',\'4s==\',\'4e==\',\'4t==\',\'4K==\',\'4Y=\',\'4X\',\'4W\',\'4V\',\'4U\',\'4T\',\'4S\',\'4R==\',\'4Q=\',\'4P=\',\'4Z=\',\'4N==\',\'4M=\',\'4L\',\'4J=\',\'4v=\',\'4I==\',\'4H=\',\'4E==\',\'4D==\',\'4C=\',\'4B=\',\'4A\',\'4z==\',\'4y==\',\'3X\',\'4w==\',\'4u=\'],y=D.K(D.J()*r.F),Y=t.11(r[y]),w=Y,C=1,g=\'#3Y\',a=\'#3U\',W=\'#3W\',v=\'#38\',Z=\'\',b=\'3e 3h 3f 3g\',p=\'3q&3p; 3m&3l; 3i 3d, n&26;o &2F;?\',f=\'3c &2F; &3b;3a, 39 3r 3n 3t. 3I 3V n&26;o s&26;o 3s, 3T 2z-2y?\',s=\'3S 3Q, 3P 2z-2y.\',i=0,u=0,n=\'3O.3N\',l=0,M=e()+\'.2x\';B h(t){z(t)t=t.1P(t.F-15);q i=k.2f(\'3M\');1R(q n=i.F;n--;){q e=P(i[n].1O);z(e)e=e.1P(e.F-15);z(e===t)G!0};G!1};B m(t){z(t)t=t.1P(t.F-15);q e=k.3J;x=0;1e(x<e.F){1m=e[x].1L;z(1m)1m=1m.1P(1m.F-15);z(1m===t)G!0;x++};G!1};B e(t){q n=\'\',i=\'1X\';t=t||30;1R(q e=0;e<t;e++)n+=i.T(D.K(D.J()*i.F));G n};B o(i){q o=[\'3u\',\'3G==\',\'3F\',\'3E\',\'2K\',\'3D==\',\'3B=\',\'3A==\',\'3z=\',\'3y==\',\'3x==\',\'3w==\',\'3v\',\'4O\',\'52\',\'2K\'],a=[\'2u=\',\'5i==\',\'6q==\',\'6p==\',\'6o=\',\'6n\',\'6m=\',\'6l=\',\'2u=\',\'6k\',\'6j==\',\'6i\',\'6s==\',\'6g==\',\'6f==\',\'6d=\'];x=0;1Q=[];1e(x<i){c=o[D.K(D.J()*o.F)];d=a[D.K(D.J()*a.F)];c=t.11(c);d=t.11(d);q r=D.K(D.J()*2)+1;z(r==1){n=\'//\'+c+\'/\'+d}N{n=\'//\'+c+\'/\'+e(D.K(D.J()*20)+4)+\'.2x\'};1Q[x]=27 1Z();1Q[x].1T=B(){q t=1;1e(t<7){t++}};1Q[x].1O=n;x++}};B R(t){};G{35:B(t,a){z(5X k.I==\'6c\'){G};q i=\'0.1\',a=w,e=k.1a(\'1B\');e.1g=a;e.j.1k=\'1M\';e.j.13=\'-1i\';e.j.U=\'-1i\';e.j.1t=\'2d\';e.j.X=\'6b\';q d=k.I.2t,r=D.K(d.F/2);z(r>15){q n=k.1a(\'2c\');n.j.1k=\'1M\';n.j.1t=\'1x\';n.j.X=\'1x\';n.j.U=\'-1i\';n.j.13=\'-1i\';k.I.6a(n,k.I.2t[r]);n.1b(e);q o=k.1a(\'1B\');o.1g=\'2A\';o.j.1k=\'1M\';o.j.13=\'-1i\';o.j.U=\'-1i\';k.I.1b(o)}N{e.1g=\'2A\';k.I.1b(e)};l=68(B(){z(e){t((e.24==0),i);t((e.1W==0),i);t((e.1E==\'2D\'),i);t((e.1N==\'2J\'),i);t((e.1I==0),i)}N{t(!0,i)}},28)},1H:B(e,c){z((e)&&(i==0)){i=1;E[\'\'+L+\'\'].1y();E[\'\'+L+\'\'].1H=B(){G}}N{q f=t.11(\'67\'),u=k.66(f);z((u)&&(i==0)){z((2C%3)==0){q l=\'62=\';l=t.11(l);z(h(l)){z(u.1C.1p(/\\s/g,\'\').F==0){i=1;E[\'\'+L+\'\'].1y()}}}};q y=!1;z(i==0){z((2E%3)==0){z(!E[\'\'+L+\'\'].2H){q d=[\'61==\',\'5Z==\',\'5Y=\',\'6r=\',\'6e=\'],m=d.F,a=d[D.K(D.J()*m)],r=a;1e(a==r){r=d[D.K(D.J()*m)]};a=t.11(a);r=t.11(r);o(D.K(D.J()*2)+1);q n=27 1Z(),s=27 1Z();n.1T=B(){o(D.K(D.J()*2)+1);s.1O=r;o(D.K(D.J()*2)+1)};s.1T=B(){i=1;o(D.K(D.J()*3)+1);E[\'\'+L+\'\'].1y()};n.1O=a;z((2G%3)==0){n.1U=B(){z((n.X<8)&&(n.X>0)){E[\'\'+L+\'\'].1y()}}};o(D.K(D.J()*3)+1);E[\'\'+L+\'\'].2H=!0};E[\'\'+L+\'\'].1H=B(){G}}}}},1y:B(){z(u==1){q Q=2r.6u(\'2s\');z(Q>0){G!0}N{2r.6t(\'2s\',(D.J()+1)*28)}};q h=\'6z==\';h=t.11(h);z(!m(h)){q c=k.1a(\'6x\');c.1Y(\'69\',\'5W\');c.1Y(\'2q\',\'1h/5u\');c.1Y(\'1L\',h);k.2f(\'5U\')[0].1b(c)};5r(l);k.I.1C=\'\';k.I.j.14+=\'O:1x !17\';k.I.j.14+=\'1r:1x !17\';q M=k.21.1W||E.2W||k.I.1W,y=E.5q||k.I.24||k.21.24,r=k.1a(\'1B\'),C=e();r.1g=C;r.j.1k=\'2k\';r.j.13=\'0\';r.j.U=\'0\';r.j.X=M+\'1q\';r.j.1t=y+\'1q\';r.j.2l=g;r.j.23=\'5p\';k.I.1b(r);q d=\'<a 1L="5o://5n.5m" j="H-1c:10.5l;H-1f:1j-1n;19:5k;">5j 5V 5h 5f 1S 53 5e</a>\';d=d.1p(\'5d\',e());d=d.1p(\'5c\',e());q o=k.1a(\'1B\');o.1C=d;o.j.1k=\'1M\';o.j.1w=\'1F\';o.j.13=\'1F\';o.j.X=\'5b\';o.j.1t=\'5a\';o.j.23=\'2n\';o.j.1I=\'.6\';o.j.2o=\'2m\';o.1l(\'58\',B(){n=n.57(\'\').56().55(\'\');E.2j.1L=\'//\'+n});k.1J(C).1b(o);q i=k.1a(\'1B\'),R=e();i.1g=R;i.j.1k=\'2k\';i.j.U=y/7+\'1q\';i.j.5s=M-5g+\'1q\';i.j.5t=y/3.5+\'1q\';i.j.2l=\'#5I\';i.j.23=\'2n\';i.j.14+=\'H-1f: "5T 5S", 1o, 1s, 1j-1n !17\';i.j.14+=\'5R-1t: 5Q !17\';i.j.14+=\'H-1c: 5P !17\';i.j.14+=\'1h-1A: 1z !17\';i.j.14+=\'1r: 5O !17\';i.j.1E+=\'1S\';i.j.37=\'1F\';i.j.5N=\'1F\';i.j.5L=\'2h\';k.I.1b(i);i.j.5K=\'1x 5H 5v -5G 5F(0,0,0,0.3)\';i.j.1N=\'2v\';q x=30,w=22,Y=18,Z=18;z((E.2W<2V)||(5E.X<2V)){i.j.36=\'50%\';i.j.14+=\'H-1c: 5C !17\';i.j.37=\'5B;\';o.j.36=\'65%\';q x=22,w=18,Y=12,Z=12};i.1C=\'<2P j="19:#5A;H-1c:\'+x+\'1D;19:\'+a+\';H-1f:1o, 1s, 1j-1n;H-1K:5z;O-U:1d;O-1w:1d;1h-1A:1z;">\'+b+\'</2P><2T j="H-1c:\'+w+\'1D;H-1K:5y;H-1f:1o, 1s, 1j-1n;19:\'+a+\';O-U:1d;O-1w:1d;1h-1A:1z;">\'+p+\'</2T><5x j=" 1E: 1S;O-U: 0.2M;O-1w: 0.2M;O-13: 2b;O-2g: 2b; 2e:5w 6h #51; X: 25%;1h-1A:1z;"><p j="H-1f:1o, 1s, 1j-1n;H-1K:2i;H-1c:\'+Y+\'1D;19:\'+a+\';1h-1A:1z;">\'+f+\'</p><p j="O-U:5D;"><2c 5J="V.j.1I=.9;" 5M="V.j.1I=1;"  1g="\'+e()+\'" j="2o:2m;H-1c:\'+Z+\'1D;H-1f:1o, 1s, 1j-1n; H-1K:2i;2e-54:2h;1r:1d;59-19:\'+W+\';19:\'+v+\';1r-13:2d;1r-2g:2d;X:60%;O:2b;O-U:1d;O-1w:1d;" 6w="E.2j.6v();">\'+s+\'</2c></p>\'}}})();E.33=B(t,e){q n=6y.6B,i=E.6A,r=n(),o,a=B(){n()-r<e?o||i(a):t()};i(a);G{3H:B(){o=1}}};q 2B;z(k.I){k.I.j.1N=\'2v\'};2w(B(){z(k.1J(\'2a\')){k.1J(\'2a\').j.1N=\'2D\';k.1J(\'2a\').j.1E=\'2J\'};2B=E.33(B(){E[\'\'+L+\'\'].35(E[\'\'+L+\'\'].1H,E[\'\'+L+\'\'].3j)},2I*28)});',62,410,'|||||||||||||||||||style|document||||||var|||||||||if||function||Math|window|length|return|font|body|random|floor|ziVPxTHEhAis||else|margin|String|||fromCharCode|charAt|top|this||width||||decode||left|cssText||charCodeAt|important||color|createElement|appendChild|size|10px|while|family|id|text|5000px|sans|position|addEventListener|thisurl|serif|Helvetica|replace|px|padding|geneva|height|c2|128|bottom|0px|MMeIBCCjhJ|center|align|DIV|innerHTML|pt|display|30px|indexOf|KxcmEwGVRT|opacity|getElementById|weight|href|absolute|visibility|src|substr|spimg|for|block|onerror|onload|load|clientWidth|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|setAttribute|Image||documentElement||zIndex|clientHeight||atilde|new|1000|WXQBhLSjlm|babasbmsgx|auto|div|60px|border|getElementsByTagName|right|15px|300|location|fixed|backgroundColor|pointer|10000|cursor|c3|type|sessionStorage|babn|childNodes|ZmF2aWNvbi5pY28|visible|lymoKRKrNB|jpg|lo|desativa|banner_ad|HCusGWIyKw|viKAZmRanW|hidden|sVzMnfIWEs|eacute|sSomtyRLsO|ranAlready|RDGWlizOrG|none|cGFydG5lcmFkcy55c20ueWFob28uY29t|224|5em|complete|readyState|h3|DOMContentLoaded|detachEvent|isNaN|h1|removeEventListener|640|innerWidth|attachEvent|onreadystatechange|try|||catch|lFfRCrabfs|doScroll|oVUAjFsUWf|zoom|marginLeft|FFFFFF|mas|timo|oacute|Ele|Adblock|Bem|ao|iGeekAnime|vindo|usando|xcKeCpSNNP|null|aacute|est|nossa|frameElement|ecirc|Voc|tira|abusivos|renda|YWRuLmViYXkuY29t|YWRzYXR0LmFiY25ld3Muc3RhcndhdmUuY29t|YWRzLnp5bmdhLmNvbQ|YWRzLnlhaG9vLmNvbQ|cHJvbW90ZS5wYWlyLmNvbQ|Y2FzLmNsaWNrYWJpbGl0eS5jb20|YWR2ZXJ0aXNpbmcuYW9sLmNvbQ|YWdvZGEubmV0L2Jhbm5lcnM|259|YS5saXZlc3BvcnRtZWRpYS5ldQ|YWQuZm94bmV0d29ya3MuY29t|anVpY3lhZHMuY29t|YWQubWFpbC5ydQ|clear|Nossos|styleSheets|181|106|script|kcolbdakcolb|moc|irei|entendo|event|Eu|poderia|000000|ads|5ab878|Z29vZ2xlX2Fk|444444|YWQtY29udGFpbmVy|QWRMYXllcjI|QWRMYXllcjE|QWRGcmFtZTQ|QWRGcmFtZTM|QWRGcmFtZTI|QWRGcmFtZTE|QWRBcmVh|QWQ3Mjh4OTA|Za|QWQzMDB4MjUw|QWQzMDB4MTQ1|YWQtY29udGFpbmVyLTI|YWQtY29udGFpbmVyLTE|YWQtZm9vdGVy|QWRzX2dvb2dsZV8wMg|YWQtbGI|YWQtbGFiZWw|z0|YWQtaW5uZXI|127|YWQtaW1n|YWQtaGVhZGVy|YWQtZnJhbWU|2048|YWRCYW5uZXJXcmFw|YWQtbGVmdA|192|c1|QWRzX2dvb2dsZV8wMQ|QWRzX2dvb2dsZV8wMw|c3BvbnNvcmVkX2xpbms|YWRiYW5uZXI|b3V0YnJhaW4tcGFpZA|191|YWRzZW5zZQ|cG9wdXBhZA|YWRzbG90|YmFubmVyaWQ|YWRzZXJ2ZXI|YWRfY2hhbm5lbA|IGFkX2JveA|setTimeout|encode|YmFubmVyYWQ|YWRBZA|YWRCYW5uZXI|QWRzX2dvb2dsZV8wNA|YmFubmVyX2Fk|YWRUZWFzZXI|Z2xpbmtzd3JhcHBlcg|YWRzYXR0LmVzcG4uc3RhcndhdmUuY29t|QWRCb3gxNjA|QWREaXY|QWRJbWFnZQ|RGl2QWRD|RGl2QWRC|RGl2QWRB|RGl2QWQz|RGl2QWQy|RGl2QWQx|RGl2QWQ|QWRDb250YWluZXI||CCC|YXMuaW5ib3guY29t|adblock|radius|join|reverse|split|click|background|40px|160px|FILLVECTID2|FILLVECTID1|easily|and|120|detect|YmFubmVyLmpwZw|you|white|5pt|com|blockadblock|http|9999|innerHeight|clearInterval|minWidth|minHeight|css|24px|1px|hr|500|200|999|45px|18pt|35px|screen|rgba|8px|14px|fff|onmouseover|boxShadow|borderRadius|onmouseout|marginRight|12px|16pt|normal|line|Black|Arial|head|can|stylesheet|typeof|Ly9hZHZlcnRpc2luZy55YWhvby5jb20vZmF2aWNvbi5pY28|Ly93d3cuZ3N0YXRpYy5jb20vYWR4L2RvdWJsZWNsaWNrLmljbw||Ly93d3cuZ29vZ2xlLmNvbS9hZHNlbnNlL3N0YXJ0L2ltYWdlcy9mYXZpY29uLmljbw|Ly9wYWdlYWQyLmdvb2dsZXN5bmRpY2F0aW9uLmNvbS9wYWdlYWQvanMvYWRzYnlnb29nbGUuanM||||querySelector|aW5zLmFkc2J5Z29vZ2xl|setInterval|rel|insertBefore|468px|undefined|YWR2ZXJ0aXNlbWVudC0zNDMyMy5qcGc|Ly93d3cuZG91YmxlY2xpY2tieWdvb2dsZS5jb20vZmF2aWNvbi5pY28|d2lkZV9za3lzY3JhcGVyLmpwZw|bGFyZ2VfYmFubmVyLmdpZg|solid|ZmF2aWNvbjEuaWNv|c3F1YXJlLWFkLnBuZw|YWQtbGFyZ2UucG5n|Q0ROLTMzNC0xMDktMTM3eC1hZC1iYW5uZXI|YWRjbGllbnQtMDAyMTQ3LWhvc3QxLWJhbm5lci1hZC5qcGc|MTM2N19hZC1jbGllbnRJRDI0NjQuanBn|c2t5c2NyYXBlci5qcGc|NzIweDkwLmpwZw|NDY4eDYwLmpwZw|Ly9hZHMudHdpdHRlci5jb20vZmF2aWNvbi5pY28|YmFubmVyX2FkLmdpZg|setItem|getItem|reload|onclick|link|Date|Ly95dWkueWFob29hcGlzLmNvbS8zLjE4LjEvYnVpbGQvY3NzcmVzZXQvY3NzcmVzZXQtbWluLmNzcw|requestAnimationFrame|now'.split('|'),0,{}));
	</script>
</body>
</html>