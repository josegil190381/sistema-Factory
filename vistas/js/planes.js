/*=============================================
EDITAR PLAN
=============================================*/

	$(".tablas").on("click", ".btnEditarPlan", function(){

		var idPlan = $(this).attr("idPlan");
		
		var datos = new FormData();
		datos.append("idPlan", idPlan);

		$.ajax({

			url:"ajax/planes.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(respuesta){
				
				
				
				$("#idPlan")		.val(respuesta["id"]);
				$("#editarPlan")	.val(respuesta["plan"]);
				$("#editarMonto")	.val(respuesta["monto"]);
				$("#editarTiempo")	.val(respuesta["tiempo"]);
				$("#editarAporte")	.val(respuesta["aportes"]);
				

			}

		});

	})

/*=============================================
ELIMINAR PLAN
=============================================*/

	$(".tablas").on("click", ".btnEliminarPlan", function(){

		 var idPlan = $(this).attr("idPlan");

		 swal({
		 	title: '¿Está seguro de borrar el Plan?',
		 	text: "¡Si no lo está puede cancelar la acción!",
		 	type: 'warning',
		 	showCancelButton: true,
		 	confirmButtonColor: '#3085d6',
		 	cancelButtonColor: '#d33',
		 	cancelButtonText: 'Cancelar',
		 	confirmButtonText: 'Si, borrar Plan!'
		 }).then(function(result){

		 	if(result.value){

		 		window.location = "index.php?ruta=planes&idPlan="+idPlan;

		 	}

		 })

	})