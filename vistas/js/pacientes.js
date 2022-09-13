/*=============================================
EDITAR PACIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarPaciente", function(){

	var idPaciente = $(this).attr("idPaciente");

	var datos = new FormData();
    datos.append("idPaciente", idPaciente);

    $.ajax({

      url:"ajax/pacientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	   $("#idPaciente").val(respuesta["id"]);
	       $("#editarPaciente").val(respuesta["nombre"]);
	       $("#editarDocumentoId").val(respuesta["documento"]);
	       $("#editarCama").val(respuesta["cama"]);
	       $("#editarFecha").val(respuesta["fecha"]);
         $("#editarAg").html(respuesta["ag"]);
         $("#editarAg").val(respuesta["ag"]);
	       $("#editarEgo").html(respuesta["ego"]);
         $("#editarEgo").val(respuesta["ego"]);
         $("#editarCult").html(respuesta["cult"]);
         $("#editarCult").val(respuesta["cult"]);
	       $("#editarPsa").html(respuesta["psa"]);
         $("#editarPsa").val(respuesta["psa"]);
         $("#editarEco").html(respuesta["eco"]);
         $("#editarEco").val(respuesta["eco"]);
	       $("#editarTom").html(respuesta["tom"]);
         $("#editarTom").val(respuesta["tom"]);
         $("#editarCard").html(respuesta["card"]);
         $("#editarCard").val(respuesta["card"]);
	       $("#editarVal").html(respuesta["val"]);
         $("#editarVal").val(respuesta["val"]);
         $("#editarHem").html(respuesta["hem"]);
         $("#editarHem").val(respuesta["hem"]);
	       $("#editarOtros").val(respuesta["otros"]);
	       $("#editarObservacion").val(respuesta["observacion"]);
	  }

  	})

})

/*=============================================
ELIMINAR PACIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarPaciente", function(){

	var idPaciente = $(this).attr("idPaciente");
	
	swal({
        title: '¿Está seguro de borrar el paciente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar paciente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=pacientes&idPaciente="+idPaciente;
        }

  })

})