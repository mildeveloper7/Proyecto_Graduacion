/*=============================================
EDITAR Pacientes
=============================================*/
$(".tablas").on("click", ".btnEditarPacientes", function(){

	var idPacientes = $(this).attr("idPacientes");

	var datos = new FormData();
    datos.append("idPacientes", idPacientes);

    $.ajax({

      url:"ajax/pacientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	   $("#id_paciente").val(respuesta["id_paciente"]);
	       $("#editarNombres").val(respuesta["nombres"]);
	       $("#editarApellidos").val(respuesta["apellidos"]);	      
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
         $("#editarEmail").val(respuesta["correo"]);
          $("#editarEdad").val(respuesta["edad"]);
	  }

  	})

})

/*=============================================
ELIMINAR Pacientes
=============================================*/
$(".tablas").on("click", ".btnEliminarPacientes", function(){

	var idPacientes = $(this).attr("idPacientes");
	
	swal({
        title: '¿Está seguro de borrar el Paciente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Paciente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=pacientes&id_paciente="+idPacientes;
        }

  })

})