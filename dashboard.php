<!DOCTYPE html>
<html>
<head>
	<title>Reserva.APT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="css/default-style.css" />
	<link rel="stylesheet" type="text/css" href="css/tema.css" />
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
	<script src="./jquery-3.2.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script> 
	<script src="./js/datepicker.js"></script>   	
	<meta charset = "UTF-8"/>

	<link rel="shortcut icon" href="./img/book-favicon.png" />

</head>

<body>

	<?php

	  // A sessão precisa ser iniciada em cada página diferente
	if (!isset($_SESSION)) session_start();
	
	  // Verifica se não há a variável da sessão que identifica o usuário
	if (!isset($_SESSION['nomeUsuario'])) {
	      // Destrói a sessão por segurança
		session_destroy();
	      // Redireciona o visitante de volta pro login
		header("Location: index.php"); exit;
	}

	?>

	<nav role="navigation" class="navbar navbar-inverse" style="border-radius:0px;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>     
				<a class="navbar-brand" href="./dashboard.php">Reserva.APT</a>
			</div>
			<div id="navbarCollapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="./dashboard.php">Home</a></li>
					<li><a href="./sobre.php">Sobre</a></li>
					<li><a href="./ajuda.php">Ajuda</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="nomeUsuario"><a href="./professor.php"><span class="glyphicon glyphicon-user"></span> Olá, <b><?php echo $_SESSION['nomeUsuario']; ?></b></a></li>
					<li><a href="./loggout.php"><span class="glyphicon glyphicon-log-in"></span> Loggout</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" style="height: 100%;">

		<div class="row">

			<div class="col-sm-3">
				<a href="./reservar.php" style="text-decoration: none;">
					<div class="bloco-vermelho">
						<span class="glyphicon glyphicon-tags" style="font-size: 50px; color: white;"></span>
						<h3 style="color: white;"><b>Reservar</b></h3>	
					</div>
				</a>
			</div>
			

			<div class="col-sm-3">
				<a href="./finalizar.php" style="text-decoration: none;">
					<div class="bloco-azul">
						<span class="glyphicon glyphicon-paste" style="font-size: 50px; color: white;"></span>
						<h3 style="color: white;"><b>Finalizar reserva</b></h3>	
					</div>
				</a>
			</div>

			<div class="col-sm-3">
				<a href="./equipamentos.php" style="text-decoration: none;">
					<div class="bloco-laranja">
						<span class="glyphicon glyphicon-blackboard" style="font-size: 50px; color: white;"></span>
						<h3 style="color: white;"><b>Equipamentos</b></h3>	
					</div>
				</a>
			</div>  

			<div class="col-sm-3">
				<a href="./professores.php" style="text-decoration: none;">
					<div class="bloco-verde-escuro">
						<span class="glyphicon glyphicon-user" style="font-size: 50px; color: white;"></span>
						<h3 style="color: white;"><b>Professores</b></h3>	
					</div>
				</a>
			</div>
			<div class="col-sm-3">
				<a href="./confirmacao.php" style="text-decoration: none;">
					<div class="bloco-verde">
						<span class="glyphicon glyphicon-floppy-saved" style="font-size: 50px; color: white;"></span>
						<h3 style="color: white;"><b>Confirmação</b></h3>	
					</div>
				</a>
			</div>

			<div class="col-sm-3">
				<a href="./pendentes.php" style="text-decoration: none;">
					<div class="bloco-roxo">
						<span class="glyphicon glyphicon-floppy-remove" style="font-size: 50px; color: white;"></span>
						<h3 style="color: white;"><b>Pendentes</b></h3>	
					</div>
				</a>
			</div>
			
			<br/><br/><br/><br/>		        	          

		</div>

	</div>

	<footer class="footer">
		<div class="container">
			<p class="text-muted" style="color: #333;"><b>Reserva.APT</b> - Desenvolvido por Francisco Higor, Emanuel Douglas e Ronny Acácio</p>
		</div>
	</footer>   

</body>
</html>