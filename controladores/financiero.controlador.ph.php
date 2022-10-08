<?php

require_once "../controladores/.controlador.php";
require_once "../modelos/pacientes.modelo.php";

class AjaxUsuarios{

	/*=============================================
	EDITAR PACIENTE
	=============================================*/	

	public $id_paciente;

	public function ajaxEditarPaciente(){

		$item = "id_paciente";
		$valor = $this->id_paciente;

		$respuesta = ControladorPacientes::ctrMostrarPacientes($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR PACIENTE
	=============================================*/	

	public $activarPaciente;
	public $activarId;


	public function ajaxActivarPaciente(){

		$tabla = "pacientes";

		$item1 = "Estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id_paciente";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarPaciente($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR PACIENTE
	=============================================*/	

	public $validarPaciente;

	public function ajaxValidarPaciente(){

		$item = "id_paciente";
		$valor = $this->validarPaciente;

		$respuesta = ControladorPacientes::ctrMostrarPacientes($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["id_paciente"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["id_paciente"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarPaciente"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarPaciente = $_POST["activarPaciente"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarPaciente();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarPaciente"])){

	$valUsuario = new AjaxPacientes();
	$valUsuario -> validarPaciente = $_POST["validarPaciente"];
	$valUsuario -> ajaxValidarPaciente();

}