<?php
include_once 'conexao.php';
include 'finalizar.php';

$professorLogado = $_SESSION['nomeUsuario'];
		
		
		$sql = "UPDATE reserva SET status='entregue' WHERE codigo = '{$_GET['id']}' ";
		if (mysql_query($sql)){

			echo  '<script>alert("Equipamento entregue. Aguardando confirmação de um administrador");</script>';
			$link = 'finalizar.php'; 
			redireciona($link);
	    	

	}else{
		include_once 'finalizar.php';
	    echo  '<script>alert("Erro ao atualizar.");</script>';
	}
	
	function redireciona($link){
		if ($link==-1){
		echo" <script>history.go(-1);</script>";
		}else{
		echo" <script>document.location.href='$link'</script>";
		}
	}

?>