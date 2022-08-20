
/*=============================================
ELIMINAR CAJA
=============================================*/
	$(".tablaCaja").on("click", ".btnEliminarCaja", function(){

	  var idCaja = $(this).attr("idCaja");
	  
	  swal({
	    title: '¿Está seguro de borrar la operación?',
	    text: "¡Si no lo está puede cancelar la accíón!",
	    type: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    cancelButtonText: 'Cancelar',
	    confirmButtonText: 'Si, borrar Caja!'
	  }).then(function(result){

	    if(result.value){

	      window.location = "index.php?ruta=caja&idCaja="+idCaja;

	    }

	  })

	})

/*=============================================
CERRAR CAJA
=============================================*/

	$(".tablaCaja").on("click", ".btnCerrarCaja", function(){

		var idCaja = $(this).attr("idCaja");
		
		var datos = new FormData();
		datos.append("idCaja", idCaja);

		$.ajax({

			url:"ajax/caja.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(respuesta){

								
				$("#idCaja").val(respuesta["id"]);
				$("#idCaja").html(respuesta["id"]);
				$("#montoCaja").val(respuesta["monto_apertura"]);
				$("#montoCaja").html(respuesta["monto_apertura"]);
				// $("#nuevoMontoCierre").val(respuesta["monto_cierre"]);
								
			}

		});

	})