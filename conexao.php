<?php
 
	$dbname="reservaatp";
	 
	$usuario="root";
	 
	$password="";
	 
	if(!($login = @mysql_connect("localhost",$usuario,$password))) {
	 
		echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
		 
		exit;
	 
	}
	 
	if(!($con=@mysql_select_db($dbname,$login))) {
	 
		echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
		 
		exit;
	 
	}
 
?>