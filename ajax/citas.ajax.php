<?php

require_once "../controladores/citas.controlador.php";
require_once "../modelos/citas.modelo.php";

class AjaxUcitas{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUcita;

	public function ajaxEditarCita(){

		$item = "id_cita";
		$valor = $this->idUcita;

		$respuesta = ControladorCitas::ctrMostrarCitas($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarCita;
	public $activarId;


	public function ajaxActivarCita(){

		$tabla = "citas";

		$item1 = "estado";
		$valor1 = $this->activarCita;

		$item2 = "id_cita";
		$valor2 = $this->activarId;

		$respuesta = ModeloCitas::mdlActualizarCita($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarCita;

	public function ajaxValidarCita(){

		$item = "id_cita";
		$valor = $this->validarCita;

		$respuesta = ControladorCitas::ctrMostrarCitas($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idCita"])){

	$editar = new AjaxCitas();
	$editar -> idCita = $_POST["idCita"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarCita"])){

	$activarUsuario = new AjaxCitas();
	$activarUsuario -> activarUsuario = $_POST["activarCita"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarCita();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarCita"])){

	$valUsuario = new AjaxCitas();
	$valUsuario -> validarCita = $_POST["validarCita"];
	$valUsuario -> ajaxValidarCita();

}