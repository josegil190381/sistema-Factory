/*=============================================
ELIMINAR COMPRA
=============================================*/
  $(".tablasCompra").on("click", ".btnEliminarCompra", function(){

  	var idCompra = $(this).attr("idCompra");
    var codigo = $(this).attr("codigo");;
  	
  	swal({
          title: '¿Está seguro de borrar la Compra?',
          text: "¡Si no lo está puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar Compra!'
        }).then(function(result){
          if (result.value) {
            
              window.location = "index.php?ruta=compras&idCompra="+idCompra;
          }

    })

  })

/*=============================================
NUEVA COMPRA STOCK
=============================================*/

  // $("#nuevoProducto").change(function(){

  //   var idProducto = $("#producto").attr("idProducto");
    
  //   var datos = new FormData();
  //     datos.append("idProducto", idProducto);

  //      $.ajax({

  //       url:"ajax/productos.ajax.php",
  //       method: "POST",
  //       data: datos,
  //       cache: false,
  //       contentType: false,
  //       processData: false,
  //       dataType:"json",
  //       success:function(respuesta){
            

  //            $("#codigoProducto").val(respuesta["codigo"]);

  //            $("#nuevoPrecioCompraStock").val(respuesta["precio_compra"]);

             

              

  //       }

  //   })

  // })