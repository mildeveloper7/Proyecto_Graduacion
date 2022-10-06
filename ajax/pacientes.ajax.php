<?php

require_once "../controladores/pacientes.controlador.php";
require_once "../modelos/pacientes.modelo.php";

class AjaxPacientes{

	/*=============================================
	EDITAR Pacientes
	=============================================*/	

	public $idPacientes;

	public function ajaxEditarPacientes(){

		$item = "id";
		$valor = $this->idPacientes;

		$respuesta = ControladorPacientes::ctrMostrarPacientes($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR Pacientes
=============================================*/	

if(isset($_POST["idPacientes"])){

	$Pacientes = new AjaxPacientes();
	$Pacientes -> idPacientes = $_POST["idPacientes"];
	$Pacientes -> ajaxEditarPacientes();

}