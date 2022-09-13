<?php

class ControladorPacientes{

	/*=============================================
	CREAR PACIENTES
	=============================================*/

	static public function ctrCrearPaciente(){

		if(isset($_POST["nuevoPaciente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPaciente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoId"])){

			   	$tabla = "pacientes";

			   	$datos = array("nombre"=>$_POST["nuevoPaciente"],
					           "documento"=>$_POST["nuevoDocumentoId"],
					           "cama"=>$_POST["nuevoCama"],
					           "fecha"=>$_POST["nuevaFecha"],
							   "ag"=>$_POST["nuevoAg"],
					           "ego"=>$_POST["nuevoEgo"],
							   "cult"=>$_POST["nuevoCult"],
					           "psa"=>$_POST["nuevoPsa"],
							   "eco"=>$_POST["nuevoEco"],
					           "tom"=>$_POST["nuevoTom"],
							   "card"=>$_POST["nuevoCard"],
					           "val"=>$_POST["nuevoVal"],
							   "hem"=>$_POST["nuevoHem"],
					           "otros"=>$_POST["nuevoOtros"],
							   "observacion"=>$_POST["nuevoObservacion"]
					           );

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
	MOSTRAR PACIENTES
	=============================================*/

	static public function ctrMostrarPacientes($item, $valor){

		$tabla = "pacientes";

		$respuesta = ModeloPacientes::mdlMostrarPacientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PACIENTE
	=============================================*/

	static public function ctrEditarPaciente(){

		if(isset($_POST["editarPaciente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPaciente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"])
			   ){

			   	$tabla = "pacientes";

			   	$datos = array("id"=>$_POST["idPaciente"],
			   				   "nombre"=>$_POST["editarPaciente"],
					           "documento"=>$_POST["editarDocumentoId"],
					           "cama"=>$_POST["editarCama"],
					           "fecha"=>$_POST["editarFecha"],
							   
							   "ag"=>$_POST["editarAg"],
					           "ego"=>$_POST["editarEgo"],
							   "cult"=>$_POST["editarCult"],
					           "psa"=>$_POST["editarPsa"],
							   "eco"=>$_POST["editarEco"],
					           "tom"=>$_POST["editarTom"],
							   "card"=>$_POST["editarCard"],
					           "val"=>$_POST["editarVal"],
							   "hem"=>$_POST["editarHem"],
					           "otros"=>$_POST["editarOtros"],
							   "observacion"=>$_POST["editarObservacion"]);

			   	$respuesta = ModeloPacientes::mdlEditarPaciente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El paciente ha sido cambiado correctamente",
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
	ELIMINAR PACIENTE
	=============================================*/

	static public function ctrEliminarPaciente(){

		if(isset($_GET["idPaciente"])){

			$tabla ="pacientes";
			$datos = $_GET["idPaciente"];

			$respuesta = ModeloPacientes::mdlEliminarPaciente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El paciente ha sido borrado correctamente",
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

