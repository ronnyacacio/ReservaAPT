<?php

include_once 'conexao.php';

$equipamento = $_GET['equipamento'];
$professor = $_GET['professor'];
$numero_de_vendas =  $_GET['numeroDeVendas'];
if($professor != null || $professor != "" ){
    
    $sql = "delete from professores where professor = '$professor'"
        
if(mysql_query($sql))
   
    echo 'cadastro realizado';
else
    echo 'erro';
}
if($equipamento != null || $equipamento != "" ){
    
        $sql = "delete from equipamentos where equipamento = '$equipamento'"
      
if(mysql_query($sql))
   
    echo 'cadastro realizado';
else
    echo 'erro';
}
if($numero_de_vendas != null || $numero_de_vendas != "" ){
    
        $sql = "delete from reserva where numero_de_vendas = '$numero_de_vendas'"
      
if(mysql_query($sql))
   
    echo 'cadastro realizado';
else
    echo 'erro';
}
}

