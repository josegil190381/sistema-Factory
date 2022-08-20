/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/
  
  if (localStorage.getItem("capturarRango") != null) {

    $("#daterange-btn4 span").html(localStorage.getItem("capturarRango"));

  }else{

    $("#daterange-btn4 span").html('<i class="fa fa--calendar"></i>Rango de fecha');

  }

/*=============================================
EDITAR GASTOS
=============================================*/
  $(".tablasCliente").on("click", ".btnEditarCliente", function(){

  	var idCliente = $(this).attr("idCliente");

  	var datos = new FormData();
      datos.append("idCliente", idCliente);

      $.ajax({

        url:"ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

        
        	 $("#idCliente").val(respuesta["id"]);
  	       $("#editarCliente").val(respuesta["nombre"]);
           $("#editarContacto").val(respuesta["contacto"]);
  	       $("#editarDocumentoId").val(respuesta["documento"]);
  	       $("#editarEmail").val(respuesta["email"]);
  	       $("#editarTelefono").val(respuesta["telefono"]);
  	       $("#editarDireccion").val(respuesta["direccion"]);
           
 
  	     }

    	})

  })

/*=============================================
ELIMINAR GASTOS
=============================================*/
  $(".tablasGastos").on("click", ".btnEliminarGasto", function(){

  	var idGasto = $(this).attr("idGasto");
  	
  	swal({
          title: '¿Está seguro de borrar la operación?',
          text: "¡Si no lo está puede cancelar la acción!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar operación!'
        }).then(function(result){
          if (result.value) {
            
              window.location = "index.php?ruta=gastos&idGasto="+idGasto;
          }

    })

  })

/*=============================================
RANGO DE FECHAS
=============================================*/

  // $('#daterange-btn4').daterangepicker(
  //   {
  //     ranges   : {
  //       'Hoy'             : [moment(), moment()],
  //       'Ayer'            : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //       'Últimos 7 días'  : [moment().subtract(6, 'days'), moment()],
  //       'Últimos 30 días' : [moment().subtract(29, 'days'), moment()],
  //       'Este mes'        : [moment().startOf('month'), moment().endOf('month')],
  //       'Último mes'      : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  //     },
  //     startDate     : moment(),
  //     endDate       : moment()
  //   },
  //   function (start, end) {
  //     $('#daterange-btn4 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

  //     var fechaInicial = start.format('YYYY-MM-DD');
  
  //     var fechaFinal = end.format('YYYY-MM-DD');

  //     var capturarRango = $("#daterange-btn4 span").html();
     
  //     localStorage.setItem("capturarRango", capturarRango);

  //     window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  //   }

  // )

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

  // $(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

  //   localStorage.removeItem("capturarRango");
  //   localStorage.clear();
  //   window.location = "gastos";
  // })

/*=============================================
CAPTURAR HOY
=============================================*/

  // $(".daterangepicker.opensleft .ranges li").on("click", function(){

  //   var textoHoy = $(this).attr("data-range-key");

  //   if(textoHoy == "Hoy"){

  //     var d = new Date();
      
  //     var dia = d.getDate();
  //     var mes = d.getMonth()+1;
  //     var año = d.getFullYear();

  //     // if(mes < 10){

  //     //  var fechaInicial = año+"-0"+mes+"-"+dia;
  //     //  var fechaFinal = año+"-0"+mes+"-"+dia;

  //     // }else if(dia < 10){

  //     //  var fechaInicial = año+"-"+mes+"-0"+dia;
  //     //  var fechaFinal = año+"-"+mes+"-0"+dia;

  //     // }else if(mes < 10 && dia < 10){

  //     //  var fechaInicial = año+"-0"+mes+"-0"+dia;
  //     //  var fechaFinal = año+"-0"+mes+"-0"+dia;

  //     // }else{

  //     //  var fechaInicial = año+"-"+mes+"-"+dia;
  //    //     var fechaFinal = año+"-"+mes+"-"+dia;

  //     // }

  //     dia = ("0"+dia).slice(-2);
  //     mes = ("0"+mes).slice(-2);

  //     var fechaInicial = año+"-"+mes+"-"+dia;
  //     var fechaFinal = año+"-"+mes+"-"+dia; 

  //       localStorage.setItem("capturarRango", "Hoy");

  //       window.location = "index.php?ruta=gastos&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  //   }

  // })

/*=============================================
VERIFICAR EL EFECTIVO ANTES DE HACER EL GASTO
=============================================*/

  $(".agregarGasto").on("change paste keyup", "input.nuevoMonto", function(){
    
    if(Number($(this).val()) > Number($(this).attr("efectivo"))){
    
      $(this).val("");

      swal({
          title: "El efectivo es insufiente",
          text: "¡Intente un monto menor!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

        return;

    }


  })
  
  

  


  





