/*=============================================
EDITAR CAMION
=============================================*/
  $(".tablaCargaCamion").on("click", ".btnEditarCarga", function(){

    var idCarga = $(this).attr("idCarga");

    var datos = new FormData();
      datos.append("idCarga", idCarga);

      $.ajax({

        url:"ajax/camion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

           $("#idCarga").val(respuesta["id"]);
           $("#editarConductor").val(respuesta["conductor"]);
           $("#editarProductoCamion").val(respuesta["productos"]);
           $("#editarCantidad").val(respuesta["cantidad"]);
           
         }

      })

  })

/*=============================================
ELIMINAR CAMION
=============================================*/
  $(".tablaCargaCamion").on("click", ".btnEliminarCarga", function(){

    var idCarga = $(this).attr("idCarga");
    
    swal({
          title: '¿Está seguro de borrar la operación?',
          text: "¡Si no lo está puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar la operación!'
        }).then(function(result){
          if (result.value) {
            
              window.location = "index.php?ruta=camion&idCarga="+idCarga;
          }

    })

  })