<?php

require_once "conexion.php";

class ModeloPacientes{

	/*=============================================
	CREAR PACIENTE
	=============================================*/

	static public function mdlIngresarPaciente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, cama, fecha, ag, ego, cult, psa, eco, tom, card, val, hem, otros, observacion) VALUES (:nombre, :documento, :cama, :fecha, :ag, :ego, :cult, :psa, :eco, :tom, :card, :val, :hem, :otros, :observacion)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":cama", $datos["cama"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":ag", $datos["ag"], PDO::PARAM_STR);
		$stmt->bindParam(":ego", $datos["ego"], PDO::PARAM_STR);
		$stmt->bindParam(":cult", $datos["cult"], PDO::PARAM_STR);
		$stmt->bindParam(":psa", $datos["psa"], PDO::PARAM_STR);
		$stmt->bindParam(":eco", $datos["eco"], PDO::PARAM_STR);
		$stmt->bindParam(":tom", $datos["tom"], PDO::PARAM_STR);
		$stmt->bindParam(":card", $datos["card"], PDO::PARAM_STR);
		$stmt->bindParam(":val", $datos["val"], PDO::PARAM_STR);
		$stmt->bindParam(":hem", $datos["hem"], PDO::PARAM_STR);
		$stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

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
	EDITAR PACIENTE
	=============================================*/

	static public function mdlEditarPaciente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, documento = :documento, cama = :cama, fecha = :fecha, ag = :ag, ego = :ego, cult = :cult, psa = :psa, eco = :eco, tom = :tom, card = :card, val = :val, hem = :hem, otros = :otros, observacion = :observacion WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":cama", $datos["cama"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":ag", $datos["ag"], PDO::PARAM_STR);
		$stmt->bindParam(":ego", $datos["ego"], PDO::PARAM_STR);
		$stmt->bindParam(":cult", $datos["cult"], PDO::PARAM_STR);
		$stmt->bindParam(":psa", $datos["psa"], PDO::PARAM_STR);
		$stmt->bindParam(":eco", $datos["eco"], PDO::PARAM_STR);
		$stmt->bindParam(":tom", $datos["tom"], PDO::PARAM_STR);
		$stmt->bindParam(":card", $datos["card"], PDO::PARAM_STR);
		$stmt->bindParam(":hem", $datos["hem"], PDO::PARAM_STR);
		$stmt->bindParam(":val", $datos["val"], PDO::PARAM_STR);
		$stmt->bindParam(":otros", $datos["otros"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR PACIENTE
	=============================================*/

	static public function mdlEliminarPaciente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR PACIENTE
	=============================================*/

	static public function mdlActualizarPaciente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}