<?php

include_once 'conexao.php';
require_once 'reserva.class.php';
$professorLogado;
$equipamento;
$codigo;

if ($horaEntregarInt==0 || $horaPegaInt==0 || $equipamento== "" || $data== "") {
	echo "<script>alert('Preencha todos os Campos')</script>";
} else {
	$reservas = mysql_fetch_array(mysql_query("SELECT * FROM reserva WHERE professor='professorLogado' and equipamento = '$equipamento'"));
	if($horaPegaString>$horaEntregaString){
		echo "<script>alert('Horario Inválido')</script>";
	} else {
		foreach ($reservas as $aux) {
			if($horaPegaString>$aux->){

			}
		}
}
}
?>