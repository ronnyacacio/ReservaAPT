<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <title>Reserva.APT - Reservar equipamento</title>
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

    $(document).ready(function(){

      $(".dropdown-menu li a").click(function(){
        var selText = $(this).text();
        $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
        
      });

      $("#horaPegar li").click(function(){
       $('#horaPegarHidden').val($(this).text());
     });

      $("#horaEntregar li").click(function(){
       $('#horaEntregarHidden').val($(this).text());
     });            

      $(document).ready(function () {
        $('#data').datepicker({
          format: "dd/mm/yyyy",
          language: "pt-BR"
        });
      });            

    });

    $('#demolist li a').on('click', function(){
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
  }
  
  ?>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Verificar disponibilidade</h4>
        </div>
        <form method="POST" action='busca.php'>
          <div class="modal-body">
            
            <div class="input-group date" data-provide="datepicker">
              <input type="text" class="form-control" placeholder="Data da reserva" name="dataReservaPes">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
            <br/>
            <select name="equipamentoPes" id="UF" class="form-control"> 
              <?php 
              include("conexao.php");
              $sql = "SELECT * FROM equipamentos";
              $resultado = mysql_query($sql);
              while($linha = mysql_fetch_array($resultado))
              {
                echo "<option value='".$linha['equipamento']."'>".$linha['equipamento']."</option> ";
              }  
              ?> 
            </select> 

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Verificar</button>
          </div>
        </form>
      </div>

    </div>
  </div>

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

      <form action="listaR.php" name="form1" method="post">
        
      </form>

    <form action="reservar-equipamento.php" method="POST"> 

      <div class="row">
        <div class="col-sm-6"> 
          <h3><b>Nova reserva
            <button type="button" class="btn btn-warning" value="Fomu1" onClick="document.form1.submit()">Equipamentos</button>
            &nbsp;&nbsp;<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">Verificar disponibilidade</button>  
          </b></h3> <br/>
          <div>
            <h5>Equipamento</h5>
            <select name="equipamento" id="UF" class="form-control"> 
              <?php 
              include("conexao.php");
              $sql = "SELECT * FROM equipamentos";
              $resultado = mysql_query($sql);
              while($linha = mysql_fetch_array($resultado))
              {
                echo "<option value='".$linha['equipamento']."'>".$linha['equipamento']."</option> ";
              }  
              ?>   nbc 33,0,;
            </select>

            <br/>

            <div class="input-group date" data-provide="datepicker">
              <input type="text" class="form-control" placeholder="Data da reserva" name="dataReserva">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

            <br/>

            <input type='hidden' ID='horaPegarHidden' name="horaPegar">
            <input type='hidden' ID='horaEntregarHidden' name="horaEntregar">

            <h5>Pegarei às</h5>
            <div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown" href="#" id="btnCountry">Selecionar horário... &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu" id="horaPegar">
                <li><a href="#">07:00h</a></li>
                <li><a href="#">07:50h</a></li>
                <li><a href="#">09:10h</a></li>
                <li><a href="#">10:00h</a></li>
                <li><a href="#">10:50h</a></li>
                <li><a href="#">13:00h</a></li>
                <li><a href="#">13:50h</a></li>
                <li><a href="#">15:10h</a></li>
                <li><a href="#">16:00h</a></li>
              </ul>
            </div>

            <h5>Entregarei às</h5>
            <div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select" data-toggle="dropdown" href="#" id="btnCountry">Selecionar horário... &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu" id="horaEntregar">
                <li><a href="#">07:50h</a></li>
                <li><a href="#">08:40h</a></li>
                <li><a href="#">10:00h</a></li>
                <li><a href="#">10:50h</a></li>
                <li><a href="#">11:40h</a></li>
                <li><a href="#">13:50h</a></li>
                <li><a href="#">14:40h</a></li>
                <li><a href="#">16:00h</a></li>
                <li><a href="#">16:50h</a></li>
              </ul>
            </div>  

            <br/><br/>
            <input class="btn btn-info" type="submit" value="Reservar equipamento" style="position: relative; right: 0;" />                      

          </div>
        </div>                  
      </div>

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
