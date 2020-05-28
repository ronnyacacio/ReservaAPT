<?php
include_once 'conexao.php';
include 'equipamentos.php';
$equipamento = $_POST['equipamento'];

if($equipamento != null || $equipamento != "" ) {

    $sqlBusca = "select * from equipamentos where equipamento='$equipamento'";
	$sql = mysql_query($sqlBusca);
	$rsult = mysql_num_rows($sql);

	if($rsult>0){

        $sql = "delete from equipamentos where equipamento = '$equipamento'";
      
		if(mysql_query($sql)) {
			echo "<script type=\"text/javascript\">alert('Equipamento removido com sucesso');</script>";
			$link = 'equipamentos.php?pagina=teste'; // especifica o endereço
			redireciona($link); // chama a função	
		}
		else
		    echo "<script type=\"text/javascript\">alert('Este equipamento não existe');</script>";
	} else {
		echo "<script type=\"text/javascript\">alert('Este equipamento não existe');</script>";	
	}

} else if($equipamento == ""){
	echo "<script type=\"text/javascript\">alert('O nome do equipamento é obrigatório para a remoção.');</script>";
}

	function redireciona($link){
		if ($link==-1){
		echo" <script>history.go(-1);</script>";
		}else{
		echo" <script>document.location.href='$link'</script>";
		}
	}

?>



