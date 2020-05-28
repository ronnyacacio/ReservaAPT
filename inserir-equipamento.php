<?php

	include_once 'conexao.php';
	include 'equipamentos.php';
	$equipamento = $_POST['equipamento'];
	$ident= $_POST['identificacao'];

	function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++){
 if($mask[$i] == '#'){
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}


	if(strlen($ident)==0){
		echo "<script>alert('Preencha todos os campos.');</script>";
	} else{
		if($ident==1){
			$ident="01";
		}
		if($ident==2){
			$ident="02";
		}
		if($ident==3){
			$ident="03";
		}
		if($ident==4){
			$ident="04";
		}
		if($ident==5){
			$ident="05";
		}
		if($ident==6){
			$ident="06";
		}
		if($ident==7){
			$ident="07";
		}
		if($ident==8){
			$ident="08";
		}
		if($ident==9){
			$ident="09";
		}
$identificacao=$ident;
$ident=mask($identificacao,'(##)');
$concat=$equipamento." ".$ident; 

	if($equipamento != null || $equipamento != "" ) {

		$sql = "insert into equipamentos(equipamento, status)"
		        . " values ('$concat', 'Funcionando')";

		if(mysql_query($sql)) {
			echo "<script>alert('Equipamento inserido com sucesso');</script>";
			$link = 'equipamentos.php'; 
			redireciona($link); 
		}
		else{
			echo "<script type=\"text/javascript\">alert('Este equipamento já existe');</script>";
			$link = 'equipamentos.php'; 
			redireciona($link); 	
		}
	} else if($equipamento == "") {
		echo "<script type=\"text/javascript\">alert('O nome do equipamento é obrigatório para a inserção.');</script>";
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
  
