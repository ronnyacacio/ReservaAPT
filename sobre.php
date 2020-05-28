<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Reserva.APT - Sobre</title>
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
            
          p{
            font-size: 18px;
          }
        
          .img-perfil {
            width: 250px;
            border-radius: 100%;
          }
        
          .bloco{
            margin-top: 10px;
            box-shadow: 5px 5px 5px #888888;
            padding: 20px 20px 0 20px; 
            text-align: center;
            background-color: white;
            height: 600px;
            
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
              <li class="active"><a href="./sobre.php">Sobre</a></li>
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

          <div class="row">
          
          <h1>O Projeto</h1>  

          <p style="font-size: 20px">O projeto Reserva.APT surgiu da necessidade evidente no processo rudimentar de reservas na então instituição Alan Pinho Tabosa.
          Visando a eficácia e praticidade, nós, então programadores e estudantes do curso de Informática desenvolvemos esta aplicação Web para facilitar e agilizar o processo de reserva
          dos professores.</p></br>

          </div>

          <div class="row">

            <h1>A Equipe</h1> </br>

            <div class="col-sm-4">
              
              <div class="bloco">
                
               <img class="img-perfil" src="./img/ronny1.jpeg"/>
                    <h2><b>Ronny Acácio</b></h2>
                    <h3 style="color: red;">(Programador / BD)</h3><br/> 
                    
                    <p>Técnico em informática pela EEEP Alan Pinho Tabosa. Fissurado em física, música e ficção científica. Pode ser encontrado em qualquer ginásio poliesportivo da cidade.</p>
                    <h4><b>Contato :</b> (85) 99268-1698</h4>
              </div>  

            </div>

            <div class="col-sm-4">
              
              <div class="bloco">
                
                <img class="img-perfil" src="./img/douglas.jpg"/>
                    <h2><b>Emanuel Douglas</b></h2>
                    <h3 style="color: red;">(Programador / Designer)</h3><br/> 
                    
                    <p>Amante da arte, cultura e conhecimento. Nas horas vagas, pianista clássico. Adora descobrir novos saberes e ultrapassar seus limites.</p>
                    <h4><b>Contato :</b> (85) 99412-4634</h4>
              </div>  

            </div>

            <div class="col-sm-4">
              
              <div class="bloco">
                
                <img class="img-perfil" src="./img/higor.jpeg"/>
                    <h2><b>F. Higor</b></h2>
                    <h3 style="color: red;">(Programador / BD)</h3><br/> 
                    <p>Nada ainda</p>
              </div>  

            </div>

          </div>

        </div>

        <br/><br/><br/>

    <footer class="footer">
    <div class="container">
      <p class="text-muted" style="color: #333;"><b>Reserva.APT</b> - Desenvolvido por Francisco Higor, Emanuel Douglas e Ronny Acácio</p>
    </div>
  </footer>         

    </body>
</html>
