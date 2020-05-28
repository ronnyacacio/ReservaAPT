<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Reserva.APT - Professores</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css" href="css/default-style.css" />
        <link rel="stylesheet" type="text/css" href="css/tema.css" />
        <meta charset = "UTF-8"/>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
        <script src="./jquery-3.2.1.min.js"></script>
        <script src="./js/bootstrap.min.js"></script> 
        <script src="./js/datepicker.js"></script>  

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

            <form action="inserir-professor.php" method="GET"> 

                <div class="row">
                    <div class="col-sm-6"> 
                        <h3><b>Novo professor</b></h3> <br/>
                        <div>
                            <input class="form-control" placeholder="Nome do professor" type="text" name="professor"/><br/>
                            <input class="form-control" placeholder="Sobrenome do professor" type="text" name="sobrenome"/><br/>
                            <input class="form-control" placeholder="Senha de acesso" type="password" name="senha"/> <br/>
                            <select class="form-control" name="tipo">
                              <option>Professor</option>
                              <option>Administrador</option>
                            </select><br/>
                            <input class="btn btn-info" type="submit" value="Salvar" style="position: relative; right: 0;" />
                        </div>
                    </div>                  
                </div>

            </form>
                
            <br/>

            <form action="remover-professor.php" method="POST"> 
                
                <div class="row">
                    <div class="col-sm-6"> 
                        <h3><b>Excluir professor</b></h3> <br/>
                        <h5>Professor</h5>
                        <select name="professor" id="UF" class="form-control" id="comboEquipamentos"> 
                            <?php 
                                 include("conexao.php");
                                 $sql = "SELECT * FROM professores";
                                 $resultado = mysql_query($sql);
                                 while($linha = mysql_fetch_array($resultado))
                                 {
                                  echo "<option value='".$linha['professor']."'>".$linha['professor']."</option> ";
                                 }  
                            ?> 
                        </select>
                        <br/>
                        <input class="btn btn-danger" type="submit" value="Excluir"/>
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
