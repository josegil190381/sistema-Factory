/*=============================================
=   ACTUALIZAR NOTIFICACIONES            =
=============================================*/

$(".actualizarNotificaciones").click(function(e){

	e.preventDefault();

	var item = $(this).attr("item");

	var datos = new FormData();
	datos.append("item", item);

	$.ajax({

		url:"ajax/notificaciones.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			

			if (respuesta == "ok") {

				if (item == "nuevos_clientes") {

					window.location = "clientes";

				}

				if (item == "nuevas_cargas") {

					window.location = "camion";

				}

				if (item == "nuevas_ventas") {

					window.location = "ventas";

				}

				if (item == "nuevos_eventos") {

					window.location = "calendario";

				}

			}

		}

	})

})