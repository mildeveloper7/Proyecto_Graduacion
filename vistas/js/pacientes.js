/*=============================================
EDITAR PACIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarPaciente", function(){

	var idCliente = $(this).attr("id_paciente");

	var datos = new FormData();
    datos.append("id_paciente", id_paciente);

    $.ajax({

      url:"ajax/pacientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	   $("#idPaciente").val(respuesta["id_paciente"]);
	       $("#editarNombres").val(respuesta["Nombres"]);
	       $("#editarApellidos").val(respuesta["Apellidos"]);
	       $("#editarTelefono").val(respuesta["Telefono"]);
	       $("#editarDireccion").val(respuesta["Direccion"]);
	       $("#editarCorreo").val(respuesta["Correo"]);
           $("#editarEdad").val(respuesta["Edad"]);
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
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
          
            window.location = "index.php?ruta=pacientes&id_paciente="+id_paciente;
        }

  })

})