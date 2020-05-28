<?php


include_once 'conexao.php';
$equipamento = $_GET['equipamento'];
$professor = $_GET['professor'];

if($equipamento != null || $equipamento != "" ){

$sql = "insert into equipamentos(equipamento)"
        . " values ('$equipamento')";

if(mysql_query($sql))
   
    echo 'cadastro realizado';
else
    echo 'erro';
}

if($professor != null || $professor != "" ){

$sql = "insert into professores(professor)"
        . " values ('$professor')";

if(mysql_query($sql))
   
    echo 'cadastro realizado';
else
    echo 'erro';
}

$equipamentoR = $_GET['equipamentoR'];
$professorR = $_GET['professorR'];
$horaP = $_GET['horarioP'];
$horaE = $_GET['horarioE'];
$data = $_GET['data'];
if($equipamentoR != null || $equipamentoR != "" ){
 $sql = "insert into reserva(hora_reserva, hora_entrega, data_reserva, professor, equipamento) 
         values ('$horaP ','$horaE','$data','$professorR','$equipamentoR')";
if(mysql_query($sql))
   
    echo 'cadastro realizado';
else
    echo 'erro';
}