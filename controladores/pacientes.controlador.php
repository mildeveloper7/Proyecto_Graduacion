<?php

class ControladorPacientes{

	/*=============================================
	CREAR Pacientes
	=============================================*/

	static public function ctrCrearPacientes(){

		if(isset($_POST["nuevoNombres"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombres"])  && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidos"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"]) && 
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   preg_match('/^[0-9]+$/', $_POST["nuevoEdad"])){

			   	$tabla = "pacientes";

			   	$datos = array("nombres"=>$_POST["nuevoNombres"],
					           "apellidos"=>$_POST["nuevoApellidos"],
					            "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"],
							   "correo"=>$_POST["nuevoEmail"],
					           "edad"=>$_POST["nuevoEdad"]);

			   	$respuesta = ModeloPacientes::mdlIngresarPacientes($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Pacientes ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "pacientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Pacientes no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "pacientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR Pacientes
	=============================================*/

	static public function ctrMostrarPacientes($item, $valor){

		$tabla = "pacientes";

		$respuesta = ModeloPacientes::mdlMostrarPacientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR Pacientes
	=============================================*/

	static public function ctrEditarPacientes(){

		if(isset($_POST["editarNombres"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombres"])  && preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarApellidos"]) && 
			preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
			preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"]) && 
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
			preg_match('/^[0-9]+$/', $_POST["editarEdad"])){

			   	$tabla = "pacientes";

			   	$datos = array("nombres"=>$_POST["editarNombres"],
								"apellidos"=>$_POST["editarApellidos"],
								"telefono"=>$_POST["editarTelefono"],
								"direccion"=>$_POST["editarDireccion"],
								"correo"=>$_POST["editarEmail"],
								"edad"=>$_POST["editarEdad"]);

			   	$respuesta = ModeloPacientes::mdlEditarPacientes($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Paciente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "pacientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Paciente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "pacientes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR Pacientes
	=============================================*/

	static public function ctrEliminarPacientes(){

		if(isset($_GET["id_paciente"])){

			$tabla ="pacientes";
			$datos = $_GET["id_paciente"];

			$respuesta = ModeloPacientes::mdlEliminarPacientes($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Paciente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "pacientes";

								}
							})

				</script>';

			}		

		}

	}

}

