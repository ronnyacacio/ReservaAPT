<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Reserva.APT - Finalizar reserva</title>
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
        if (!isset($_SESSION))
            session_start();

        // Verifica se não há a variável da sessão que identifica o usuário
        if (!isset($_SESSION['nomeUsuario'])) {
            // Destrói a sessão por segurança
            session_destroy();
            // Redireciona o visitante de volta pro login
            header("Location: index.php");
            exit;
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
                                while ($linha = mysql_fetch_array($resultado)) {
                                    echo "<option value='" . $linha['equipamento'] . "'>" . $linha['equipamento'] . "</option> ";
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
                

                echo "<h3><b>Finalizar Reserva</b> - (Minhas reservas)</h3><br/>";

                $hora_atual = ((date("G") * 100) + date("i"))-500;
                $data = date("Y")."-".date("m")."-".date("d");

                $sql = mysql_query("SELECT hora_entrega FROM reserva WHERE professor='$professorLogado'");
                $sqli = mysql_query("SELECT * FROM reserva WHERE professor = '$professorLogado'");

                $sqlprofessor = mysql_query("SELECT * FROM reserva WHERE professor='$professorLogado'");
                echo '<div class="table-responsive">';
                echo '<table class="table"><tr><th>Equipamento</th><th>Data</th><th>Hora Reserva</th><th>Hora Entrega</th><th>Finalizar</th></tr>';
                while ($exibe = mysql_fetch_assoc($sqlprofessor)) {

                    $counter = 0;
                    $a = $exibe['data_reserva'];
                    $hora_reserva = $exibe['hora_entrega'];

                    $date1 = strtr($a, '/', '-');
                    $dataReservaConvertida = date('Y-m-d', strtotime($date1));
                      
                    if(mysql_num_rows($sqli)==0){
                    include_once'finalizar.php';
                     }
                    else if(strtotime($dataReservaConvertida)<strtotime($data)){
                    include_once 'finalizar.php';
                    $counter++; 
                    }else if(strtotime($dataReservaConvertida)==strtotime($data)){
                     if($hora_reserva<$hora_atual){
                     include_once 'finalizar.php';
                    $counter++;
                    }           
            }else{
            include_once 'finalizar.php';
        }

                    if($counter>0){
                   
                    echo '<tr>';
                    echo '<td>' . $exibe['equipamento'] . '</td>';
                    echo '<td>' . $exibe['data_reserva'] . '</td>';
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
                    $id = $exibe['codigo'];
                    $status  = $exibe['status'];
                    if($status=='entregue'){
                        echo '<td> <a href="finalizarReserva.php?id='.$id.'> <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span></button> </a></td>';    
                        echo '</tr>';   
                    } else{
                        echo '<td> <a href="finalizarReserva.php?id='.$id.'> <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-down"></span></button> </a></td>';    
                        echo '</tr>';
                    }
                    

                   } else {
                    echo '<tr>';
                    echo '<td>' . $exibe['equipamento'] . '</td>';
                    echo '<td>' . $exibe['data_reserva'] . '</td>';
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
                    $id = $exibe['codigo'];
                    $status  = $exibe['status'];
                    if($status=='entregue'){
                        echo '<td> <a href="finalizarReserva.php?id='.$id.'> <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span></button> </a></td>';    
                        echo '</tr>';   
                    } else{
                        echo '<td> <a href="finalizarReserva.php?id='.$id.'> <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-thumbs-up"></span></button> </a></td>';    
                        echo '</tr>';
                    }
                   }
                } 

                echo '</table>';
                echo '</div>';
                ?>
            

        </div>


        <br/><br/><br/>

        <footer class="footer">
            <div class="container">
                <p class="text-muted" style="color: #333;"><b>Reserva.APT</b> - Desenvolvido por Francisco Higor, Emanuel Douglas e Ronny Acácio</p>
            </div>
        </footer>        

    </body>
</html>