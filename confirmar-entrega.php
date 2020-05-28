<?php
include_once 'conexao.php';
include 'confirmacao.php';
        $sql = "DELETE FROM reserva WHERE codigo = '{$_GET['id']}' ";
        $professorLogado = $_SESSION['nomeUsuario'];
        $nom = mysql_query("SELECT * FROM reserva WHERE codigo = '{$_GET['id']}' ");
        $nome = mysql_fetch_assoc($nom);
      	$a = $nome['professor'];
      	echo "<script type=\"text/javascript\">alert($a);</script>";
      	if($professorLogado==$a){
      		echo "<script type=\"text/javascript\">alert('Desculpe, outro administrador deve confirmar sua entrega');</script>";
      	} else{
		if(mysql_query($sql)) {
			echo "<script type=\"text/javascript\">alert('Reserva Finalizada');</script>";
			$link = 'confirmacao.php'; // especifica o endereço
			redireciona($link); // chama a função	
		}
		else{
		    echo "<script type=\"text/javascript\">alert('Esta reserva não existe');</script>";
		}
	}
		function redireciona($link){
		if ($link==-1){
		echo" <script>history.go(-1);</script>";
		}else{
		echo" <script>document.location.href='$link'</script>";
		}
	}
?>	