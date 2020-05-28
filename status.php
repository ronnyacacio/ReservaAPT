<?php 
include_once 'conexao.php';
$equipamento = $_POST['equipamentoPes'];
$sql1= mysql_query("SELECT * FROM equipamentos WHERE equipamento='$equipamento'");
$sql=mysql_fetch_assoc($sql1);
$st=$sql['status'];
if($st=="Funcionando"){
	$status = mysql_query("UPDATE equipamentos SET status='Danificado' WHERE equipamento = '$equipamento'");

	echo  "<script>alert('Mudança de status para <Danificado>.');</script>";
	$link = 'equipamentos.php'; 
	redireciona($link);	
	
} else{
	$status = mysql_query("UPDATE equipamentos SET status='Funcionando' WHERE equipamento = '$equipamento'");
	
	echo  '<script>alert("Mudança de status para <Funcionando>.");</script>';
	$link = 'equipamentos.php'; 
	redireciona($link);
}



function redireciona($link){
	if ($link==-1){	
		echo" <script>history.go(-1);</script>";
	}else{
		echo" <script>document.location.href='$link'</script>";
	}
}
?>