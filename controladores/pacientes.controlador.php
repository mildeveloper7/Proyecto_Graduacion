<?php

class ControladorPacientes{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrPaciente(){

		if(isset($_POST["nuevoPaciente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPaciente"])){

				$tabla = "pacientes";

				$datos = $_POST["nuevopPaciente"];

				$respuesta = ModeloPacientes::mdlIngresarPaciente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El paciente ha sido guardado correctamente",
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
						  title: "¡Los datos del paciente no pueden ir vacios!",
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
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarPacientes($item, $valor){

		$tabla = "pacientes";

		$respuesta = ModeloPacientes::mdlMostrarPacientes($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarPaciente(){

		if(isset($_POST["editarPaciente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPaciente"])){

				$tabla = "pacientes";

				$datos = array("paciente"=>$_POST["editarPaciente"],
							   "id"=>$_POST["id_paciente"]);

				$respuesta = ModeloPacientes::mdlEditarPaciente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El paciente ha sido editado correctamente",
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
						  title: "¡El paciente no puede ir vacío o llevar caracteres especiales!",
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
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarPaciente(){

		if(isset($_GET["id_paciente"])){

			$tabla ="pacientes";
			$datos = $_GET["id_paciente"];

			$respuesta = ModeloPacientes::mdlBorrarPaciente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El paciente ha sido borrado correctamente",
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
}