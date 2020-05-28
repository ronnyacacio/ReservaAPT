<?php


class entidade
{

	private $codigo;
	private $professor;
	private $equipamento;
        public  $data;
         public $horaReserva;
           public $horaEntrega;

	function getCodigo() {
            return $this->codigo;
        }

        function getProfessor() {
            return $this->professor;
        }

        function getEquipamento() {
            return $this->equipamento;
        }

        function getData() {
            return $this->data;
        }

        function getHoraReserva() {
            return $this->horaReserva;
        }

        function getHoraEntrega() {
            return $this->horaEntrega;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        function setProfessor($professor) {
            $this->professor = $professor;
        }

        function setEquipamento($equipamento) {
            $this->equipamento = $equipamento;
        }

        function setData($data) {
            $this->data = $data;
        }

        function setHoraReserva($hora_reserva) {
            $this->hora_reserva = $hora_reserva;
        }

        function setHoraEntrega($hora_entrega) {
            $this->hora_entrega = $hora_entrega;
        }
}