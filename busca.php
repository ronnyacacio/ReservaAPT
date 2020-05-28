
<!DOCTYPE html>
<html>
<head>
  <title>Reserva.APT - Disponibilidade</title>
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

      <h3>Horários ocupados</h3>

      <?php

        include_once 'conexao.php';
        include_once 'classeReserva.php';

        $equipamento = $_POST['equipamentoPes'];
        $data = $_POST['dataReservaPes'];
        $a = new classeReserva();
        $b=$a->Imprimir($data, $equipamento);

        echo '<b><h4 style="color: red;">'.$equipamento.'</h4></b><br/>';

        echo '<table class="table"><tr><th>Professor</th><th>Hora Reserva</th><th>Hora Entrega</th>'
                  . '</tr>';
                  if(mysql_num_rows($b)==0){
                    echo "<script type=\"text/javascript\">alert('Este equipamento está disponível em todos os horários desta data');</script>";
                    $link = 'reservar.php'; // especifica o endereço
                    redireciona($link); // chama a função 
                  }else {
        while($exibe = mysql_fetch_assoc($b)) {
          echo '<tr>';
          echo '<td>'.($exibe['professor']).'</td>';
          $hr=$exibe['hora_reserva']/100;
          $he=$exibe['hora_entrega']/100;
          if(is_int($hr)){
            echo '<td>'.($exibe['hora_reserva']/100).".00 h".'</td>';
          }else{
            echo '<td>'.($exibe['hora_reserva']/100)."0 h".'</td>';
          }
          if(is_int($he)){
            echo '<td>'.($exibe['hora_entrega']/100).".00 h".'</td>';
          }else{
            echo '<td>'.($exibe['hora_entrega']/100)."0 h".'</td>'; 
          }
          echo '</tr>';  
          
        }
          echo '</table>';
}

          function redireciona($link){
            if ($link==-1){
            echo" <script>history.go(-1);</script>";
            }else{
            echo" <script>document.location.href='$link'</script>";
            }
          }

      ?>
      <form action="reservar.php">
      <input class="btn btn-info" type="submit" value="Voltar" style="position: relative; right: 0;" />
      </form>
  </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted" style="color: #333;"><b>Reserva.APT</b> - Desenvolvido por Francisco Higor, Emanuel Douglas e Ronny Acácio</p>
      </div>
    </footer>   

</body>
</html>

