<?php

require_once "conexion.php";

class ModeloPacientes{

	/*=============================================
	MOSTRAR PACIENTES
	=============================================*/

	static public function mdlMostrarPacientes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE PACIENTE
	=============================================*/

	static public function mdlIngresarPaciente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Nombres, Apellidos, Telefono, Direccion, Correo, Edad) VALUES (:Nombres, :Apellidos, :Telefono, :Direccion, :Correo, :Edad)");

		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarPaciente($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombres = :Nombres, Apellidos = :Apellidos, Telefono = :Telefono, Direccion = :Direccion, Correo = :Correo, Edad = :Edad WHERE id_paciente = :id_paciente");
 
		$stmt -> bindParam(":Nombres", $datos["Nombres"], PDO::PARAM_STR);
		$stmt -> bindParam(":Apellidos", $datos["Apellidos"], PDO::PARAM_STR);
		$stmt -> bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
		$stmt -> bindParam(":Correo", $datos["Correo"], PDO::PARAM_STR);
		$stmt -> bindParam(":Edad", $datos["Edad"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarPaciente($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarPaciente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_paciente = :id_paciente");

		$stmt -> bindParam(":id_paciente", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}