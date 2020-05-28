<!DOCTYPE html>
<html>
<head>
  <title>Reserva.APT - Pendentes</title>
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

      <h3><b>Reservas Pendentes</b></h3><br/>

      <?php
      $cont = 0;

        include_once 'conexao.php';
        include_once 'classeReserva.php';
        $professor= $_SESSION['nomeUsuario'];
  $sqli = mysql_query("SELECT * FROM reserva");

  $hora_atual = ((date("G") * 100) + date("i"))-500;
  $data = date("Y")."-".date("m")."-".date("d");

  
  echo '<table class="table"><tr><th>Professor</th><th>Equipamento</th><th>Data</th><th>Hora Reserva</th><th>Hora Entrega</th>'
                  . '</tr>';

    while ($exibe = mysql_fetch_assoc($sqli)) {
      $counter = 0;

    $a = $exibe['data_reserva'];
      $hora_reserva = $exibe['hora_entrega'];

      $date1 = strtr($a, '/', '-');
      $dataReservaConvertida = date('Y-m-d', strtotime($date1));

    if(mysql_num_rows($sqli)==0){
      include_once'pendentes.php';
    }
     else if(strtotime($dataReservaConvertida)<strtotime($data)){
      include_once 'pendentes.php';
      $counter++; 
    }else if(strtotime($dataReservaConvertida)==strtotime($data)){
      if($hora_reserva<$hora_atual){
        include_once 'pendentes.php';
        $counter++;
      }     
    }

    else{
      include_once 'pendentes.php';
    }

  

  if($counter > 0){
        $cont++;
        
          echo '<tr>';
          echo '<td>'.($exibe['professor']).'</td>';
          echo '<td>'.($exibe['equipamento']).'</td>';
          echo '<td>'.($exibe['data_reserva']).'</td>';
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
      }

      echo '</table>';

          function redireciona($link){
            if ($link==-1){
            echo" <script>history.go(-1);</script>";
            }else{
            echo" <script>document.location.href='$link'</script>";
            }
          }


          if($cont==0){
            echo "<center><h3>Nenhum equipamento pendente</h3></center>";
          }

      ?>

  </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted" style="color: #333;"><b>Reserva.APT</b> - Desenvolvido por Francisco Higor, Emanuel Douglas e Ronny Acácio</p>
      </div>
    </footer>   

</body>
</html>