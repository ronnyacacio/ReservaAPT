<?php

include_once 'conexao.php';

include_once 'reservar.php';
include_once 'entidade.php';
include_once 'classeReserva.php';
$data = $_POST['dataReserva'];
$professorLogado = $_SESSION['nomeUsuario'];
$equipamento = $_POST['equipamento'];

$horaPegaString = $_POST['horaPegar'];
$horaEntregarString = $_POST['horaEntregar'];

$horaPegaInt;
$horaEntregarInt;

switch ($horaPegaString) {
    case '07:00h':
    $horaPegaInt = 700;
    break;

    case '07:50h':
    $horaPegaInt = 750;
    break;

    case '09:10h':
    $horaPegaInt = 910;
    break;

    case '10:00h':
    $horaPegaInt = 1000;
    break;

    case '10:50h':
    $horaPegaInt = 1050;
    break;

    case '13:00h':
    $horaPegaInt = 1300;
    break;

    case '13:50h':
    $horaPegaInt = 1350;
    break;

    case '15:10h':
    $horaPegaInt = 1510;
    break;

    case '16:00h':
    $horaPegaInt = 1600;
    break;

    default:
    $horaPegaInt = 0;
    break;
}

switch ($horaEntregarString) {
    case '07:50h':
    $horaEntregarInt = 750;
    break;

    case '08:40h':
    $horaEntregarInt = 840;
    break;

    case '10:00h':
    $horaEntregarInt = 1000;
    break;

    case '10:50h':
    $horaEntregarInt = 1050;
    break;

    case '11:40h':
    $horaEntregarInt = 1140;
    break;

    case '13:50h':
    $horaEntregarInt = 1350;
    break;

    case '14:40h':
    $horaEntregarInt = 1440;
    break;

    case '16:00h':
    $horaEntregarInt = 1600;
    break;

    case '16:50h':
    $horaEntregarInt = 1650;
    break;

    default:
    $horaEntregarInt = 0;
    break;  


}
$contador=0;

if($horaEntregarInt-$horaPegaInt<=140){
    $contador++;
}else if($horaEntregarInt==1000 && $horaPegaInt==750){
    $contador++;
}else if($horaEntregarInt==1350 && $horaPegaInt==1050){
    $contador++;
}else if($horaEntregarInt==1600 && $horaPegaInt==1350){
    $contador++;
}else {
    $contador=0;
}
if($contador==0){
    echo "<script>alert('O horário inserido é inválido para a reserva')</script>";
} else {

    $numero= mysql_query("SELECT * FROM reserva WHERE professor='$professorLogado'");
    $status1 = mysql_query("SELECT * FROM equipamentos WHERE equipamento='$equipamento'");
    $st = mysql_fetch_assoc($status1);
    $status = $st['status'];
    if($status=='Danificado'){
        echo "<script>alert('Desculpe, o equipamento em questão esta danificado.')</script>";
    }else{
        if(mysql_num_rows($numero)>=3){
            echo "<script>alert('Desculpe,o número de reservas limite foi ultrapassado.')</script>";
        }else{

            $datasiste = date("Y")."-".date("m")."-".date("d");
            $datapendente=date("d")."/".date("m")."/".date("Y"); 
            $hora_atual = ((date("G") * 100) + date("i"))-500;
            $contad=0;
            $date1 = strtr($data, '/', '-');
            $dataE = date('Y-m-d', strtotime($date1));
            $r = new classeReserva();
            $query = $r->pegarReservas();
            while($exibe = mysql_fetch_assoc($query)){
                if($exibe['professor']==$professorLogado){
                    if($exibe['status']=='pendente'){
                        if($exibe['data_reserva']!=$datapendente){
                            $contad++;
                        }
                    }
                }
            }
            if($contad!=0){
                echo "<script>alert('Desculpe, voçê possui um equipamento ainda pendente, finalize-a para concluir sua reserva.')</script>";
            } else {

                if(strtotime($dataE) > strtotime($datasiste)) {

                    if ($horaEntregarInt == 0 || $horaPegaInt == 0 || $equipamento == "" || $data == "") {
                        echo "<script>alert('Preencha todos os campos')</script>";
                    } else {
                        if ($horaEntregarInt<=$horaPegaInt) {
                            echo "<script>alert('O horário inserido é inválido para a reserva')</script>";
                        } else {
                            $cont = 0;

                            $r = new classeReserva();

                            $query = $r->pegarReservas();

                            while ($exibe = mysql_fetch_assoc($query)) {

                                $aux = $exibe['hora_reserva'];
                                $aux2 = $exibe['hora_entrega'];
                                $databu = $exibe['data_reserva'];
                                $equip = $exibe['equipamento'];

                                if($databu==$data && $equip == $equipamento){
                                    if($horaPegaInt == $horaEntregarInt){
                                        $cont++;
                                    }if($horaPegaInt == $aux || $horaEntregarInt == $aux2){
                                        $cont++;
                                    }if ($horaPegaInt > $aux && $horaEntregarInt < $aux2) {
                                        $cont++;
                                    }if ($horaPegaInt < $aux && $horaEntregarInt > $aux2) {
                                        $cont++;
                                    }if ($horaPegaInt < $aux && $horaEntregarInt < $aux2 && $horaEntregarInt > $aux) {
                                        $cont++;
                                    }if ($horaPegaInt > $aux && $horaEntregarInt > $aux2 && $horaPegaInt < $aux2) {
                                        $cont++;
                                    }
                                }

                            }
                            if ($cont == 0) {
                                $sql = "insert into reserva (professor, equipamento, data_reserva, hora_reserva, hora_entrega, codigo) values('$professorLogado', '$equipamento', '$data', '$horaPegaInt', '$horaEntregarInt',0)";
                                if (mysql_query($sql)) {
                                    echo "<script>alert('Equipamento reservado com sucesso')</script>";
                                } else if(!mysql_query($sql)){
                                    include_once 'reservar-equipamento.php';
                                    echo '<script>alert("Erro ao cadastrar!!!");</script>';
                                }
                            } else {
                                echo '<script>alert("Desculpe, este horário não está disponível para reservas, tente novamente mais tarde.");</script>';
                            }

                        }    }
                    } else if (strtotime($dataE) == strtotime($datasiste)){
                        if ($horaEntregarInt == 0 || $horaPegaInt == 0 || $equipamento == "" || $data == "") {
                            echo "<script>alert('Preencha todos os campos')</script>";
                        } else {
                            if ($hora_atual>$horaPegaInt) {
                                echo "<script>alert('O horário inserido é inválido para a reserva')</script>";
                            } else {
                                $cont = 0;

                                $r = new classeReserva();

                                $query = $r->pegarReservas();

                                while ($exibe = mysql_fetch_assoc($query)) {

                                    $aux = $exibe['hora_reserva'];
                                    $aux2 = $exibe['hora_entrega'];
                                    $databu = $exibe['data_reserva'];
                                    $equip = $exibe['equipamento'];

                                    if($databu==$data && $equip == $equipamento){
                                        if($horaPegaInt == $horaEntregarInt){
                                            $cont++;
                                        }if($horaPegaInt == $aux || $horaEntregarInt == $aux2){
                                            $cont++;
                                        }if ($horaPegaInt > $aux && $horaEntregarInt < $aux2) {
                                            $cont++;
                                        }if ($horaPegaInt < $aux && $horaEntregarInt > $aux2) {
                                            $cont++;
                                        }if ($horaPegaInt < $aux && $horaEntregarInt < $aux2 && $horaEntregarInt > $aux) {
                                            $cont++;
                                        }if ($horaPegaInt > $aux && $horaEntregarInt > $aux2 && $horaPegaInt < $aux2) {
                                            $cont++;
                                        }
                                    }

                                }
                                if ($cont == 0) {
                                    $sql = "insert into reserva (professor, equipamento, data_reserva, hora_reserva, hora_entrega, codigo) values('$professorLogado', '$equipamento', '$data', '$horaPegaInt', '$horaEntregarInt',0)";
                                    if (mysql_query($sql)) {
                                        echo "<script>alert('Equipamento reservado com sucesso')</script>";
                                    } else if(!mysql_query($sql)){
                                        include_once 'reservar-equipamento.php';
                                        echo '<script>alert("Erro ao cadastrar!!!");</script>';
                                    }
                                } else {
                                    echo '<script>alert("Desculpe, este horário não está disponível para reservas, tente novamente mais tarde.");</script>';
                                }

                            }    }
                        } else {
                            echo "<script>alert('A data inserida é inválida para a reserva')</script>";
                        }}}
                    }}
?>