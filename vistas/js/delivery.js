/*=============================================
EDITAR DELIVERY
=============================================*/
  $(".tablaDelivery").on("click", ".btnEditarDelivery", function(){

    var idDelivery = $(this).attr("idDelivery");

    var datos = new FormData();
      datos.append("idDelivery", idDelivery);

      $.ajax({

        url:"ajax/delivery.ajax.php",
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
ELIMINAR DELIVERY
=============================================*/
  $(".tablaDelivery").on("click", ".btnEliminarDelivery", function(){

    var idDelivery = $(this).attr("idDelivery");
    
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
            
              window.location = "index.php?ruta=delivery&idDelivery="+idDelivery;
          }

    })

  })