<?php

	include_once 'conexao.php';
	include_once 'entidade.php';

class classeReserva
{

        public function pegarReservas(){
$a=0;
$sql = "select * from reserva";
$query = mysql_query($sql);


    return $query;

	
}
		public function Imprimir($data, $equipamento)
		{
			$a=0;
$sql = "select * from reserva where equipamento='$equipamento' and data_reserva='$data'";
$query = mysql_query($sql);


    return $query;
		}

		public function Entregue($professorLogado)
		{
			$a=0;
			$sql= "select tipo from professor where professor='$professorLogado'";
			$query = mysql_query($sql);

			return $query;
		}

}
