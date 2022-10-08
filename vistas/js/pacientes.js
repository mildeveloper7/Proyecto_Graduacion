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
      
      	   $("#idPacientes").val(respuesta["id"]);
	       $("#editarPacientes").val(respuesta["nombre"]);
	       $("#editarDocumentoId").val(respuesta["documento"]);
	       $("#editarEmail").val(respuesta["email"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
           $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
	  }

  	})

})

/*=============================================
ELIMINAR Pacientes
=============================================*/
$(".tablas").on("click", ".btnEliminarPacientes", function(){

	var idPacientes = $(this).attr("idPacientes");
	
	swal({
        title: '¿Está seguro de borrar el Pacientes?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Pacientes!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=Pacientess&idPacientes="+idPacientes;
        }

  })

})