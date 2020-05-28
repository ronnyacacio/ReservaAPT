<?php 
include_once 'conexao.php';

$usuario = $_POST['nome_usuario'];
$senha = $_POST['senha_usuario'];
$pesquisa = mysql_query("select * from professores where professor = '$usuario' and senha = '$senha'");
$row = mysql_num_rows($pesquisa);

if($usuario!="" && $senha!=""){

	if($row != 1){
		echo "<script type=\"text/javascript\">alert('Usuário ou senha incorretos.');</script>";
		include_once './index.php';
	} else {

		$resultado = mysql_fetch_assoc($pesquisa);

		if(!isset($_SESSION)) session_start();

		$_SESSION['nomeUsuario'] = $resultado['professor'];
		$_SESSION['senhaUsuario'] = $resultado['senha'];
		$_SESSION['tipoUsuario'] = $resultado['tipo'];
		$professor = $resultado['professor'];	
		
		include_once './dashboard.php';
		include_once './pendente.php';

	}

} else {
	echo "<script type=\"text/javascript\">alert('Preencha todos os campos.');</script>";
	include_once './index.php';	
}		

?>