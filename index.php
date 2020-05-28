<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Reserva.APT | Entrar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="css/default-style.css" />
        <link rel="stylesheet" type="text/css" href="css/tema.css" />
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" href="./img/book-favicon.png" />
    </head>

  <body style="position:relative;">
  
      <?php
       
          // A sessão precisa ser iniciada em cada página diferente
          if (!isset($_SESSION)) session_start();
           
          // Verifica se não há a variável da sessão que identifica o usuário
          if (isset($_SESSION['nomeUsuario'])) {
              // Redireciona o visitante para a dashboard
              header("Location: dashboard.php"); exit;
          }
           
      ?>

    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 ">
            
            </div>
        </div>
      <div class="row">
          

    <div class="col-md-6 col-md-offset-3" style="border-radius: 10px; padding:0;">

        <div class="page-header" style="text-align:center">
            <h2><b>Reserva.APT</b></h2>
        </div>

        <form action="validar.php" method="post" style="width: 100%;">

                <div class="form-group has-feedback" style="margin-right: 55px; margin-left: 55px;">
                    <i class="glyphicon glyphicon-user form-control-feedback"></i>
                    <input type="text" name="nome_usuario" class="form-control" placeholder="Nome de usuário" />
                </div>

                <div class="form-group has-feedback" style="margin-right: 55px; margin-left: 55px;">
                    <i class="glyphicon glyphicon-lock form-control-feedback"></i>
                    <input type="password" name="senha_usuario" class="form-control" placeholder="Palavra-passe" />
                </div>

                <div class="form-group" style="margin-right: 55px; margin-left: 55px; text-align:center">
                    <input type="submit" class="btn btn-success" style="width: 100%;" value="Entrar" />                
                </div>
                <br/>
            
        </form>

    </div>

    </div> 
    <div>  

  </body>
</html>
