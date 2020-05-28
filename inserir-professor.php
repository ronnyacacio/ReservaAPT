<?php

	include_once 'conexao.php';
	include 'professores.php';

	$professor = $_GET['professor'];
	$sobrenome = $_GET['sobrenome'];
	$tipo = $_GET['tipo'];
	$senha = $_GET['senha'];

	if($professor != "" && $senha != "" && $sobrenome){

		$nome = $professor." ".$sobrenome;

		if(isset($_GET['professor']) && isset($_GET['senha'])) {

			$sql = "insert into professores(professor, senha, tipo)"
			        . "values ('$nome','$senha', '$tipo')";

			if(mysql_query($sql)){
				echo "<script type=\"text/javascript\">alert('Professor inserido com sucesso');</script>";
				$link = 'professores.php'; // especifica o endereço
				redireciona($link); // chama a função	
			} else {
			    echo "<script type=\"text/javascript\">alert('Este professor já existe');</script>";
			}

		}

	} else {
		echo "<script type=\"text/javascript\">alert('Preencha todos os campos');</script>";
	}

	function redireciona($link){
		if ($link==-1){
		echo" <script>history.go(-1);</script>";
		}else{
		echo" <script>document.location.href='$link'</script>";
		}
	}	

?>
  
