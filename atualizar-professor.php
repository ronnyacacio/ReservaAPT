<?php

include_once 'conexao.php';
include_once 'professor.php';

$professor = $_GET['professor'];
$sobrenome = $_GET['sobrenome'];
$senha = $_GET['senha'];
$professorLogado = $_SESSION['nomeUsuario'];

$nome = $professor." ".$sobrenome;
if($professor=="" || $sobrenome=="" || $senha==""){
	echo  '<script>alert("Todos os campos são necessários para a validação");</script>';
} else{

	$sql = "UPDATE professores SET professor='$nome', senha='$senha' WHERE professor='$professorLogado'";

	if (mysql_query($sql)){

	$_SESSION['nomeUsuario'] = $nome;

		echo  '<script>alert("Todas as alterações foram salvas");</script>';
		

	}else{
		include_once 'professor.php';
		echo  '<script>alert("Erro ao atualizar.");</script>';
	}

	function redireciona($link){
		if ($link==-1){
			echo" <script>history.go(-1);</script>";
		}else{
			echo" <script>document.location.href='$link'</script>";
		}
	}

	
	$link = 'dashboard.php'; 
	redireciona($link);
}

?>