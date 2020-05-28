<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <title>Reserva.APT - Ajuda</title>
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

  <style type="text/css">
    .bloco{
      background-color: black;
      height: 400px;
    } 

    .nome{
      width: 92%;  
      height: 80px;
      background-color: blue;
      position: absolute;
      bottom: 0;  
    } 
  </style>

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
          <li><a href="./dashboard.php">Home</a></li>
          <li><a href="./sobre.php">Sobre</a></li>
          <li class="active"><a href="./ajuda.php">Ajuda</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li id="nomeUsuario"><a href="./professor.php"><span class="glyphicon glyphicon-user"></span> Olá, <b><?php echo $_SESSION['nomeUsuario']; ?></b></a></li>
          <li><a href="./loggout.php"><span class="glyphicon glyphicon-log-in"></span> Loggout</a></li>
        </ul>
      </div>
    </div>
  </nav>  

  <div class="container">
    
    <div class="row">
      <div class="col-sm-6">
        <h3><span class="glyphicon glyphicon-tags" style="font-size: 18px;"></span> &nbsp;&nbsp;Reservando um equipamento</h3>
        <hr/>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-8">
        <p><b>1. </b> Para reservar um equipamento primeiro acesse a <a href="./reservar.php">área de reservas</a>. </p> 
        <p><b>2. </b> Em seguida selecione o equipamento que deseja reservar:</p> <img src="./pagina-ajuda/caixa-de-equipamentos.png">
        <p><b>3. </b> Selecione a data em que deseja utilizar este equipamento, lembre-se de que, você só pode reservar na data e hora atuais em diante. </p> <img src="./pagina-ajuda/data.png">
        <p><b>4. </b> Selecione o horário em que deseja utilizar este equipamento</p> <img src="./pagina-ajuda/horarios.png"></br>
        <i>(Nota 1: Você tem 100 minutos no máximo para o uso do equipamento por reserva)</i></br>
        <i>(Nota 2: Os horários de intervalo não são contabilizados na reserva)</i></br></br>
        <p>Lembre-se, você pode verificar a disponibilidade de horários para o equipamento ao clicar neste botão</p> <img src="./pagina-ajuda/disponibilidade.png">
        <p><b>5. </b> Por fim, reserve o equipamento clicando no botão de reserva no final da página</p> <img src="./pagina-ajuda/botao-reservar.png">
        <p><i>(Nota: Você só pode possuir 3 reservas ativas em sua conta, não podendo ultrapassar este limite)</i></p>
      </div>
    </div> 

  </hr>

  <div class="row">
    <div class="col-sm-6">
      <h3><span class="glyphicon glyphicon-paste" style="font-size: 18px;"></span> &nbsp;&nbsp;Finalizando uma reserva</h3>
      <hr/>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-8">
      <p><b>1. </b> Para finalizar uma reserva primeiro acesse a <a href="./finalizar.php">área de finalização</a>. </p> 
      <p><b>2. </b> Selecione dentre suas reservas a que você deseja finalizar e, clique no botão azul para  confirmar a entrega<img src="./pagina-ajuda/joia-azul.png"> </br>
        <p><b>3. </b> Aguarde a confirmação da entrega por um administrador, </p>
        <i>(Nota 1: Todos os equipamentos entregues em aguardo estarão com o botão verde) <img src="./pagina-ajuda/joia-verde.png"></i></p> 
        <i>(Nota 2: Todos os equipamentos pendentes estarão com o botão vermelho) <img src="./pagina-ajuda/dislike.png"></i>
      </div>
    </div>                          

  </div>

</br></br></br>

<footer class="footer">
  <div class="container">
    <p class="text-muted" style="color: #333;"><b>Reserva.APT</b> - Desenvolvido por Francisco Higor, Emanuel Douglas e Ronny Acácio</p>
  </div>
</footer>      

</body>
</html>
