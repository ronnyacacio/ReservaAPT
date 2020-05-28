<?php

include_once 'conexao.php';
include_once 'dashboard.php';
$professor= $_SESSION['nomeUsuario'];

$sql = mysql_query("SELECT hora_entrega FROM reserva WHERE professor='$professor'");
$sqli = mysql_query("SELECT * FROM reserva WHERE professor = '$professor'");

$hora_atual = ((date("G") * 100) + date("i"))-500;
$data = date("Y")."-".date("m")."-".date("d");

$counter = 0;

while ($exibe = mysql_fetch_assoc($sqli)) {

	$a = $exibe['data_reserva'];
	$hora_reserva = $exibe['hora_entrega'];

	$date1 = strtr($a, '/', '-');
	$dataReservaConvertida = date('Y-m-d', strtotime($date1));
	
	if(mysql_num_rows($sqli)==0){
		include_once'dashboard.php';
	}
	else if(strtotime($dataReservaConvertida)<strtotime($data)){
		include_once 'dashboard.php';
		$counter++;
		$pendente = mysql_query("UPDATE reserva SET status='pendente' WHERE professor='$professor' and data_reserva = '$a' and hora_entrega = '$hora_reserva'");
	}else if(strtotime($dataReservaConvertida)==strtotime($data)){
		if($hora_reserva<$hora_atual){
			include_once 'dashboard.php';
			$counter++;
			$pendente = mysql_query("UPDATE reserva SET status='pendente' WHERE professor='$professor' and data_reserva = '$a' and hora_entrega = '$hora_reserva'");
		}			
	}

	else{
		include_once 'dashboard.php';
	}

}

if($counter == 1){
	echo "<script>alert('Você possui uma entrega pendente');</script>";	
		$link = 'dashboard.php'; // especifica o endereço
		redireciona($link); // chama a função			
	} else if($counter > 1){
		echo "<script>alert('Você possui ".$counter." entregas pendentes');</script>";
		$link = 'dashboard.php'; // especifica o endereço
		redireciona($link); // chama a função			
	} 

	function redireciona($link){
		if ($link==-1){
			echo" <script>history.go(-1);</script>";
		}else{
			echo" <script>document.location.href='$link'</script>";
		}
	}		

	?>