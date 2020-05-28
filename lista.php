<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<title>Reserva.APT - Status do equipamento</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="css/default-style.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="css/tema.css" />
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
	<script src="./jquery-3.2.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script> 
	<script src="./js/datepicker.js"></script>           
	<meta charset = "UTF-8"/>

	<link rel="shortcut icon" href="./img/book-favicon.png" />

	<script>

		$('.datepicker').datepicker();

		$(document).ready(function () {

			$(".dropdown-menu li a").click(function () {
				var selText = $(this).text();
				$(this).parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');

			});

			$("#horaPegar li").click(function () {
				$('#horaPegarHidden').val($(this).text());
			});

			$("#horaEntregar li").click(function () {
				$('#horaEntregarHidden').val($(this).text());
			});

			$(document).ready(function () {
				$('#data').datepicker({
					format: "dd/mm/yyyy",
					language: "pt-BR"
				});
			});

		});

		$('#demolist li a').on('click', function () {
			$('#horaHidden').val($(this).html());
		});

	</script>
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
	} else {

		$tipoUser = $_SESSION['tipoUsuario'];
		if($tipoUser=="Professor"){
			echo "<script type=\"text/javascript\">alert('Somente um administrador pode acessar esta página.');</script>";  
              $link = 'dashboard.php'; // especifica o endereço
              atualizar($link); // chama a função 
          }
          
      }

      function atualizar($link) {
      	if ($link==-1){
      		echo" <script>history.go(-1);</script>";
      	}else{
      		echo" <script>document.location.href='$link'</script>";
      	}
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
      				<li><a href="./dashboard.php">Home</a></li>
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
      <div class="container">

      	<form action="finalizarReserva.php" method="POST"> 

      		<div class="row">
      			<div class="col-sm-6"> 
      				

      				<div>

      					<br/>


      				</div>
      			</div>                  
      		</div>

      	</form>
      	<?php
      	include_once 'entidade.php';
      	include_once 'classeReserva.php';
      	include_once 'conexao.php';
      	$professorLogado = $_SESSION['nomeUsuario'];

      	echo "<h3><b>Equipamentos</b></h3><br/>";
      	$sqli = mysql_query("SELECT * FROM equipamentos");
      	echo '<div class="table-responsive">';
      	echo '<table class="table"><tr><th>Equipamento</th><th>Status</th></tr>';
      	while ($exibe = mysql_fetch_assoc($sqli)) {

      		echo '<tr>';
      		echo '<td>' . $exibe['equipamento'] . '</td>';
      		echo '<td>' . $exibe['status'] . '</td>';
      		echo '</tr>';

      	}
      	
      	echo '</table>';
      	echo '</div>';
      	?>
      	<form action="equipamentos.php">
      		<input class="btn btn-info" type="submit" value="Voltar" style="position: relative; right: 0;" />
      	</form>
      	

      </div>

      <br/><br/><br/>

      <footer class="footer">
      	<div class="container">
      		<p class="text-muted" style="color: #333;"><b>Reserva.APT</b> - Desenvolvido por Francisco Higor, Emanuel Douglas e Ronny Acácio</p>
      	</div>
      </footer>
  </body>
  </html>