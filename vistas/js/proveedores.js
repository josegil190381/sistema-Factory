/*=============================================
EDITAR PROVEEDOR
=============================================*/
  $(".tablasProveedor").on("click", ".btnEditarProveedor", function(){

  	var idProveedor = $(this).attr("idProveedor");

  	var datos = new FormData();
      datos.append("idProveedor", idProveedor);

      $.ajax({

        url:"ajax/proveedores.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

        
        	 $("#idProveedor").val(respuesta["id"]);
  	       $("#editarProveedor").val(respuesta["nombre"]);
           $("#editarContacto").val(respuesta["contacto"]);
  	       $("#editarDocumentoId").val(respuesta["documento"]);
  	       $("#editarEmail").val(respuesta["email"]);
  	       $("#editarTelefono").val(respuesta["telefono"]);
  	       $("#editarDireccion").val(respuesta["direccion"]);
           
 
  	     }

    	})

  })

/*=============================================
ELIMINAR PROVEEDOR
=============================================*/
  $(".tablasProveedor").on("click", ".btnEliminarProveedor", function(){

    var idProveedor = $(this).attr("idProveedor");
    
    swal({
          title: '¿Está seguro de borrar el Proveedor?',
          text: "¡Si no lo está puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar proveedor!'
        }).then(function(result){
          if (result.value) {
            
              window.location = "index.php?ruta=proveedores&idProveedor="+idProveedor;
          }

    })

  })

/*=============================================
VER OPERACIONES DE PROVEEDORES
=============================================*/

  $(".tablasProveedor").on("click", ".btnVerProveedor", function(){

    var idProveedor = $(this).attr("idProveedor");

    window.location = "index.php?ruta=operaciones-proveedor&idProveedor="+idProveedor;


  })