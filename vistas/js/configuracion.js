
/*=============================================
EDITAR CONFIGURACION
=============================================*/

    // $(".configuracion").on("click", ".editarConfiguracion", function(){

    $("#editarConfiguracion").click(function(){

    var idConfiguracion = $(this).attr("idConfiguracion");
    
    var datos = new FormData();
    datos.append("idConfiguracion", idConfiguracion);

    $.ajax({

      url:"ajax/configuracion.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta){
        
        $("#editarNombreC")    	.val(respuesta["nombre"]);
        $("#editarRucC")     	.val(respuesta["ruc"]);
        $("#editarRazonC")   	.val(respuesta["razon_social"]);
        $("#editarTelefonoC")  	.val(respuesta["telefono"]);
        $("#editarEmailC")   	.val(respuesta["email"]);
        $("#editarDireccionC") 	.val(respuesta["direccion"]);
        $("#editarIvaC")     	.val(respuesta["iva"]);

      }

    });

  })

/*=============================================
SELECCIONAR IMPRESORA
=============================================*/

  // function recuperar_impresoras_disponibles() {
  //    $lista = $("#impresoras");
  //    $.post('./modulos/complementos/lista_impresoras.php', function (respuesta) {
  //        respuesta = JSON.parse(respuesta);
  //        if (Array.isArray(respuesta)) {
  //            if (respuesta.length <= 0) {
  //                $lista.empty().append($("<option>", {
  //                    value: 0,
  //                    text: "Ninguna impresora disponible. Asegúrate de compartirla."
  //                }));
  //                return;
  //            }
  //            $lista.empty().prop("disabled", false);
  //            $lista
  //                .append(
  //                    $("<option>", {
  //                        value: "null",
  //                        text: "--Por favor seleciona--"
  //                    })
  //                );
  //            respuesta.forEach(function (valor) {
  //                $lista
  //                    .append(
  //                        $("<option>", {
  //                            value: valor,
  //                            text: valor
  //                        })
  //                    );
  //            });

  //        }
  //    });
  // }

  // function poner_impresora() {
  //  $.post('./modulos/complementos/dame_impresora.php', function (respuesta) {
  //      respuesta = JSON.parse(respuesta);
  //      if (respuesta !== false) $("#impresora_seleccionada").text(respuesta);
  //  });
  // }

  // function escuchar_elementos() {
  //   $("#impresoras").change(function () {
  //       var nombre = $(this).val();
  //       if (nombre !== "null") {
  //           $.post('./modulos/complementos/cambia_impresora.php', {nombre: nombre}, function (respuesta) {
  //               respuesta = JSON.parse(respuesta);
  //               if (respuesta === true) window.location.reload();
  //           });
  //       }
  //   });
      
  // }
