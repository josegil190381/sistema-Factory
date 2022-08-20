/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/
	
	if (localStorage.getItem("capturarRango") != null) {

		$("#daterange-btn span").html(localStorage.getItem("capturarRango"));

	}else{

		$("#daterange-btn span").html('<i class="fa fa--calendar"></i>Rango de fecha');

	}

/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS PARA CREAR VENTAS
=============================================*/

	// $.ajax({

	// 	url: "ajax/datatable-ventas.ajax.php",
	// 	success:function(respuesta){
			
	// 		console.log("respuesta", respuesta);

	// 	}

	// })// 



	$('.tablaVentas').DataTable( {

				
	    "ajax": "ajax/datatable-ventas.ajax.php",
	    "deferRender": true,
		"retrieve": true,
		"processing": true,
		 "language": {

				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}

		}



	} );

/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

	// $.ajax({

	// url: "ajax/datatable-lista-ventas.ajax.php",
	// success:function(respuesta){
			
	//  		console.log("respuesta", respuesta);

	//  	}

	//  })

	var perfilOculto = $("#perfilOculto").val();

	$('.tablasVentasTotales').DataTable( {



		"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\Gs. ,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            var numFormat = $.fn.dataTable.render.number( '\.', ',' ).display;
	       	       
            $( api.column( 6 ).footer() ).html(
                'TOTAL:  Gs. ' + numFormat(pageTotal, '\.', ',' )
            );
        },
		
	    "ajax": "ajax/datatable-lista-ventas.ajax.php?perfilOculto="+perfilOculto,
	    "deferRender": true,
		"retrieve": true,
		"processing": false,

		responsive: {
	            details: {
	                display: $.fn.dataTable.Responsive.display.modal( {
	                    header: function ( row ) {
	                        var data = row.data();
	                        return 'Detalles para: '+data[3]+'';
	                    }
	                } ),
	                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
	                    
	                } )
	            }
	        },

	        "order": [[ 1, "desc" ]],

							

		 "language": {

				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}

		}

	} );

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

	$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

		var idProducto = $(this).attr("idProducto");

		$(this).removeClass("btn-primary agregarProducto");

		$(this).addClass("btn-default");

		var datos = new FormData();
	    datos.append("idProducto", idProducto);

	    $.ajax({

	     	url:"ajax/productos.ajax.php",
	      	method: "POST",
	      	data: datos,
	      	cache: false,
	      	contentType: false,
	      	processData: false,
	      	dataType:"json",
	      	success:function(respuesta){

	      	    var descripcion = respuesta["descripcion"];
	          	var stock = respuesta["stock"];
	          	var precio = respuesta["precio_venta"];

	          	/*=============================================
	          	EVITAR AGREGAR PRODUCTO CUANDO EL STOCK ESTÁ EN CERO
	          	=============================================*/

	          	if(stock == 0){

	      			swal({
				      title: "No hay stock disponible",
				      type: "error",
				      confirmButtonText: "¡Cerrar!"
				    });

				    $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

				    return;

	          	}

	          	$(".nuevoProducto").append(

	          	'<div class="row" style="padding:5px 15px">'+

				  '<!-- Descripción del producto -->'+
		          
		          '<div class="col-xs-6" style="padding-right:0px">'+
		          
		            '<div class="input-group">'+
		              
		              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

		              '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

		            '</div>'+

		          '</div>'+

		          '<!-- Cantidad del producto -->'+

		          '<div class="col-xs-2">'+
		            
		             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+

		          '</div>' +

		          '<!-- Precio del producto -->'+

		          '<div class="col-xs-4 ingresoPrecio" style="padding-left:0px">'+

		            '<div class="input-group">'+

		              '<span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span>'+
		                 
		              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" id="nuevoPrecioProducto" value="'+precio+'" readonly required>'+
		 
		            '</div>'+
		             
		          '</div>'+

		        '</div>') 



		        // SUMAR TOTAL DE PRECIOS

		        sumarTotalPrecios()

		        // AGREGAR IMPUESTO

		        agregarImpuesto()

		        // AGRUPAR PRODUCTOS EN FORMATO JSON

		        listarProductos()

		        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

		        $(".nuevoPrecioProducto").number(true, 0, ",", ".");


				localStorage.removeItem("quitarProducto");

				

	      	}

	    })

	});

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE EL LECTOR DE CODIGO DE BARRAS
=============================================*/

	$("#codigoBarras").keypress(function(event) {  

	  	if(event.which == 13) { 


	  		var cantidad = 1;
		  	var codigo = $("#codigoBarras").val();

		  	var array1 = codigo.split("*");

		  	if (array1 [1] > 1) {

		  		cantidad = array1[0];
		  		codigo = array1[1];
		  	}

		  	if (codigo === ""){

		  		toastr.error("Ingrese un Código");
		  		return false;
		  	}
		  				
			var datos = new FormData();
		    datos.append("codigo", codigo);

		    $.ajax({

		     	url:"ajax/productos.ajax.php",
		      	method: "POST",
		      	data: datos,
		      	cache: false,
		      	contentType: false,
		      	processData: false,
		      	dataType:"json",
		      	success:function(respuesta){

		      		var descripcion = respuesta["descripcion"];
		      		var stock = respuesta["stock"];
		          	var precio = respuesta["precio_venta"]*cantidad;
		          	var id = respuesta["id"];


		          			          	
		      		if (respuesta["codigo_barras"] !=codigo){

		  				toastr.error("Codigo no existe");
		  				return false;

		  			}		  				

		          	/*=============================================
		          	EVITAR AGREGAR PRODUCTO CUANDO EL STOCK ESTÁ EN CERO
		          	=============================================*/

		          	if(stock == 0){

		          		toastr.error("No hay stock disponible");
		  				return false;

					    $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");
					    return;

		          	}

		          	if(array1[0] > stock){

		          		toastr.error("No hay stock disponible");
		  				return false;

					    $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");
					    return;

		          	}

		          	
		          	$(".nuevoProducto").append(

		          	'<div class="row" style="padding:5px 15px">'+

					  '<!-- Descripción del producto -->'+
			          
			          '<div class="col-xs-6" style="padding-right:0px">'+
			          
			            '<div class="input-group">'+
			              
			              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+id+'"><i class="fa fa-times"></i></button></span>'+

			              '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+id+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

			            '</div>'+

			          '</div>'+

			          '<!-- Cantidad del producto -->'+

				          '<div class="col-xs-2">'+
				            
				             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'+cantidad+'" stock="'+stock+'" nuevoStock="'+Number(stock-cantidad)+'" required>'+

				          '</div>' +

				          '<!-- Precio del producto -->'+

				          '<div class="col-xs-4 ingresoPrecio" style="padding-left:0px">'+

				            '<div class="input-group">'+

				              '<span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span>'+
				                 
				              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" id="nuevoPrecioProducto" value="'+precio+'" required>'+
				 
				            '</div>'+
				             
				          '</div>'+

			        '</div>') 


			        // SUMAR TOTAL DE PRECIOS

			        sumarTotalPrecios()

			        // AGREGAR IMPUESTO

			        agregarImpuesto()

			        // AGRUPAR PRODUCTOS EN FORMATO JSON

			        listarProductos()

			        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

			        $(".nuevoPrecioProducto").number(true, 0, ",", ".");


					localStorage.removeItem("quitarProducto");

					toastr.success("Producto Agregado");
		  			return;

					
		      	}

		    })

		  	$("#codigoBarras").val("");
	    
	  	}

	});

/*=============================================
CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
=============================================*/

	$(".tablaVentas").on("draw.dt", function(){

		if(localStorage.getItem("quitarProducto") != null){

			var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

			for(var i = 0; i < listaIdProductos.length; i++){

				$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
				$("button.recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

			}


		}


	})

/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/

	var idQuitarProducto = [];

	localStorage.removeItem("quitarProducto");

	$(".tablaVenta").on("click", "button.quitarProducto", function(){

		$(this).parent().parent().parent().parent().remove();

		var idProducto = $(this).attr("idProducto");

		/*=============================================
		ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
		=============================================*/

		if(localStorage.getItem("quitarProducto") == null){

			idQuitarProducto = [];
		
		}else{

			idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

		}

		idQuitarProducto.push({"idProducto":idProducto});

		localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

		$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

		$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

		if($(".nuevoProducto").children().length == 0){

			$("#nuevoImpuestoVenta").val(0);
			$("#nuevoTotalVenta").val(0);
			$("#totalVenta").val(0);
			$("#nuevoTotalVenta").attr("total",0);
			$("#guaranies").html("");

		}else{

			// SUMAR TOTAL DE PRECIOS

	    	sumarTotalPrecios()

	    	// AGREGAR IMPUESTO
		        
	        agregarImpuesto()

	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

		}

	})

/*=============================================
AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
=============================================*/

	var numProducto = 0;

	$(".btnAgregarProducto").click(function(){

		numProducto ++;

		var datos = new FormData();
		datos.append("traerProductos", "ok");

		$.ajax({

			url:"ajax/productos.ajax.php",
	      	method: "POST",
	      	data: datos,
	      	cache: false,
	      	contentType: false,
	      	processData: false,
	      	dataType:"json",
	      	success:function(respuesta){
	      	    
	      	    	$(".nuevoProducto").append(

	          	'<div class="row" style="padding:5px 15px">'+

				  '<!-- Descripción del producto -->'+
		          
		          '<div class="col-xs-6" style="padding-right:0px">'+
		          
		            '<div class="input-group">'+
		              
		              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+

		              '<select class="form-control select2 nuevaDescripcionProducto" id="producto'+numProducto+'" idProducto name="nuevaDescripcionProducto" required>'+

		              '<option>Seleccione el producto</option>'+

		              '</select>'+  

		            '</div>'+

		          '</div>'+

		          '<!-- Cantidad del producto -->'+

		          '<div class="col-xs-3 ingresoCantidad">'+
		            
		             '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="0" stock nuevoStock required>'+

		          '</div>' +

		          '<!-- Precio del producto -->'+

		          '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+

		            '<div class="input-group">'+

		              '<span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span>'+
		                 
		              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" readonly required>'+
		 
		            '</div>'+
		             
		          '</div>'+

		        '</div>');


		        // AGREGAR LOS PRODUCTOS AL SELECT 

		         respuesta.forEach(funcionForEach);

		         function funcionForEach(item, index){

		         	if(item.stock != 0){

			         	$("#producto"+numProducto).append(

							'<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
			         	)

			         
			         }	         

		         }

	        	 // SUMAR TOTAL DE PRECIOS

	    		sumarTotalPrecios()

	    		// AGREGAR IMPUESTO
		        
		        agregarImpuesto()

		        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

		        $(".nuevoPrecioProducto").number(true, 2);


	      	}

		})

	})

/*=============================================
SELECCIONAR PRODUCTO DESDE EL DISPOSITIVO
=============================================*/

	$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

		var nombreProducto = $(this).val();

		var nuevaDescripcionProducto = $(this).parent().parent().parent().children().children().children(".nuevaDescripcionProducto");

		var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

		var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

		var datos = new FormData();
	    datos.append("nombreProducto", nombreProducto);


		  $.ajax({

	     	url:"ajax/productos.ajax.php",
	      	method: "POST",
	      	data: datos,
	      	cache: false,
	      	contentType: false,
	      	processData: false,
	      	dataType:"json",
	      	success:function(respuesta){
	      	    
	      	    $(nuevaDescripcionProducto).attr("idProducto", respuesta["id"]);
	      	    $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
	      	    $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-1);
	      	    $(nuevoPrecioProducto).val(respuesta["precio_venta"]);
	      	    $(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);

	  	      // AGRUPAR PRODUCTOS EN FORMATO JSON

		        listarProductos()

	      	}

	      })
	})

/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/

	$(".tablaVenta").on("input", "input.nuevaCantidadProducto", function(){

		var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

		var precioFinal = $(this).val() * precio.attr("precioReal");
		
		precio.val(precioFinal);

		var nuevoStock = Number($(this).attr("stock")) - $(this).val();

		$(this).attr("nuevoStock", nuevoStock);

		if(Number($(this).val()) > Number($(this).attr("stock"))){

			/*=============================================
			SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VALORES INICIALES
			=============================================*/

			$(this).val(1);

			$(this).attr("nuevoStock", $(this).attr("stock"));

			var precioFinal = $(this).val() * precio.attr("precioReal");

			precio.val(precioFinal);

			sumarTotalPrecios();

			swal({
		      title: "La cantidad supera el Stock",
		      text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

		    return;

		}

		// SUMAR TOTAL DE PRECIOS

		sumarTotalPrecios()

		// AGREGAR IMPUESTO
		        
	    agregarImpuesto()

	    // AGRUPAR PRODUCTOS EN FORMATO JSON

	    listarProductos()

	})

/*=============================================
MODIFICAR EL PRECIO DE VENTA DEL PRODUCTO
=============================================*/

	// $(".formularioVenta").on("change", "input.nuevoPrecioProducto", function(){

	// 	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	// 	var precioFinal = $(this).val() * precio.attr("precioReal");
		
	// 	precio.val(precioFinal);

	// 	// SUMAR TOTAL DE PRECIOS

	// 	sumarTotalPrecios()

	// 	// AGREGAR IMPUESTO
		        
	//     agregarImpuesto()

	//     // AGRUPAR PRODUCTOS EN FORMATO JSON

	//     listarProductos()

	// })

/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

	function sumarTotalPrecios(){

		var precioItem = $(".nuevoPrecioProducto");
		
		var arraySumaPrecio = [];  

		for(var i = 0; i < precioItem.length; i++){

			 arraySumaPrecio.push(Number($(precioItem[i]).val()));
			

		}

		function sumaArrayPrecios(total, numero){

			return total + numero;

		}

		var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
		
		// var guaranies = sumaTotalPrecio.toLocaleString('es-ES');
		
		$("#nuevoTotalVenta").val(sumaTotalPrecio);
		$("#totalVenta").val(sumaTotalPrecio);
		$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);
		$("#guaranies").html('Gs '+sumaTotalPrecio).number( true, 0,",",".");
		



	}

/*=============================================
FUNCIÓN AGREGAR IMPUESTO
=============================================*/

	// function agregarImpuesto(){

	// 	var impuesto = $("#nuevoImpuestoVenta").val();
	// 	var precioTotal = $("#nuevoTotalVenta").attr("total");

	// 	var precioImpuesto = Number(precioTotal * impuesto/100);

	// 	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);
		
	// 	$("#nuevoTotalVenta").val(totalConImpuesto);

	// 	$("#totalVenta").val(totalConImpuesto);

	// 	$("#nuevoPrecioImpuesto").val(precioImpuesto);

	// 	$("#nuevoPrecioNeto").val(precioTotal);

	// }

	function agregarImpuesto(){

		var impuesto = $("#nuevoImpuestoVenta").attr("iva");
		var precioTotal = $("#nuevoTotalVenta").attr("total");

		var precioImpuesto = Number(precioTotal / impuesto);

		// var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);
		
		$("#nuevoTotalVenta").val(precioTotal);

		$("#totalVenta").val(precioTotal);

		$("#nuevoPrecioImpuesto").val(precioImpuesto);

		$("#nuevoPrecioNeto").val(precioTotal);

	}

/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================*/

	$("#nuevoImpuestoVenta").change(function(){

		agregarImpuesto();

	});

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/

	$("#nuevoTotalVenta").number(true, 0);

/*=============================================
SELECCIONAR MÉTODO DE PAGO
=============================================*/

	$('#nuevoValorEfectivo').number( true, 0,",",".");
	$('#nuevoCambioEfectivo').number( true, 0,",",".");

	// $("#nuevoMetodoPago").change(function(){

	// 	var metodo = $(this).val();

	// 	if(metodo == "Efectivo"){

	// 		$(this).parent().parent().removeClass("col-xs-6");

	// 		$(this).parent().parent().addClass("col-xs-4");

	// 		$(this).parent().parent().parent().children(".cajasMetodoPago").html(

	// 			 '<div class="col-xs-4">'+ 

	// 			 	'<div class="input-group">'+ 

	// 			 		'<span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span>'+ 

	// 			 		'<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="0000" required>'+

	// 			 	'</div>'+

	// 			 '</div>'+

	// 			 '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+

	// 			 	'<div class="input-group">'+

	// 			 		'<span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span>'+

	// 			 		'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="0000"  readonly required>'+

	// 			 	'</div>'+

	// 			 '</div>'

	// 		 )

	// 		// Agregar formato al precio

	// 		$('#nuevoValorEfectivo').number( true, 0,",",".");
	//       	$('#nuevoCambioEfectivo').number( true, 0,",",".");


	//       	// Listar método en la entrada
	//       	listarMetodos()

	// 	}else{

	// 		$(this).parent().parent().removeClass('col-xs-4');

	// 		$(this).parent().parent().addClass('col-xs-6');

	// 		 $(this).parent().parent().parent().children('.cajasMetodoPago').html(

	// 		 	'<div class="col-xs-6" style="padding-left:0px">'+
	                        
	//                 '<div class="input-group">'+
	                     
	//                   '<input type="number" min="0" class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>'+
	                       
	//                   '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+
	                  
	//                 '</div>'+

	//               '</div>')

	// 	}

		

	// })

/*=============================================
CAMBIO EN EFECTIVO
=============================================*/

	$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

		var efectivo = $(this).val();

		var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

		var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');
			
		nuevoCambioEfectivo.val(cambio);

		// var devolucion = cambio.toLocaleString('es-ES');

		$("#devolucion").html('Gs '+cambio).number( true, 0,",",".");

	})

	// $(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

	// 	var efectivo = $(this).val();

	// 	var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

	// 	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

	// 	nuevoCambioEfectivo.val(cambio);

	// })

/*=============================================
CAMBIO TRANSACCIÓN
=============================================*/

	// $(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){

	// 	// Listar método en la entrada
	//      listarMetodos()


	// })

/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

	function listarProductos(){

		var listaProductos = [];

		var descripcion = $(".nuevaDescripcionProducto");

		var cantidad = $(".nuevaCantidadProducto");

		var precio = $(".nuevoPrecioProducto");

		for(var i = 0; i < descripcion.length; i++){

			listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
								  "descripcion" : $(descripcion[i]).val(),
								  "cantidad" : $(cantidad[i]).val(),
								  "stock" : $(cantidad[i]).attr("nuevoStock"),
								  "precio" : $(precio[i]).attr("precioReal"),
								  "total" : $(precio[i]).val()})

		}

		$("#listaProductos").val(JSON.stringify(listaProductos)); 

	}

/*=============================================
LISTAR MÉTODO DE PAGO
=============================================*/

	// function listarMetodos(){

	// 	var listaMetodos = "";

	// 	if($("#nuevoMetodoPago").val() == "Efectivo"){

	// 		$("#listaMetodoPago").val("Efectivo");

	// 	}else{

	// 		$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());

	// 	}

	// }

/*=============================================
BOTON EDITAR VENTA
=============================================*/

	$(".tablasVentasTotales, .tablas").on("click", ".btnEditarVenta", function(){

		var idVenta = $(this).attr("idVenta");

		window.location = "index.php?ruta=editar-venta&idVenta="+idVenta;


	})

/*=============================================
BOTON VER VENTA
=============================================*/

	$(".tablasVentasTotales, .tablas").on("click", ".btnVerVenta", function(){

		var idVenta = $(this).attr("idVenta");

		window.location = "index.php?ruta=ver-ventas&idVenta="+idVenta;


	})

/*=============================================
FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABÍA SIDO SELECCIONADO EN LA CARPETA
=============================================*/

	function quitarAgregarProducto(){

		//Capturamos todos los id de productos que fueron elegidos en la venta
		var idProductos = $(".quitarProducto");

		//Capturamos todos los botones de agregar que aparecen en la tabla
		var botonesTabla = $(".tablaVentas tbody button.agregarProducto");

		//Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
		for(var i = 0; i < idProductos.length; i++){

			//Capturamos los Id de los productos agregados a la venta
			var boton = $(idProductos[i]).attr("idProducto");
			
			//Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
			for(var j = 0; j < botonesTabla.length; j ++){

				if($(botonesTabla[j]).attr("idProducto") == boton){

					$(botonesTabla[j]).removeClass("btn-primary agregarProducto");
					$(botonesTabla[j]).addClass("btn-default");

				}
			}

		}
		
	}

/*=============================================
CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAR LA FUNCIÓN:
=============================================*/

	$('.tablaVentas').on( 'draw.dt', function(){

		quitarAgregarProducto();

	})

/*=============================================
BORRAR VENTA
=============================================*/

	$(".tablasVentasTotales, .tablas").on("click", ".btnEliminarVenta", function(){

	  var idVenta = $(this).attr("idVenta");

	  swal({
	        title: '¿Está seguro de borrar la venta?',
	        text: "¡Si no lo está puede cancelar la accíón!",
	        type: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        cancelButtonText: 'Cancelar',
	        confirmButtonText: 'Si, borrar venta!'
	      }).then(function(result){
	        if (result.value) {
	          
	            window.location = "index.php?ruta=ventas&idVenta="+idVenta;
	        }

	  })

	})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

	// $(".tablasVentasTotales, .tablas").on("click", ".btnImprimirFactura", function(){

	// 	var idVenta = $(this).attr("idVenta");

	// 	window.open("extensiones/tcpdf/pdf/factura.php?id="+idVenta, "_blank");

	// })



	$(".tablasVentasTotales, .tablas").on("click", ".btnImprimirFactura", function(){

		var idVenta = $(this).attr("idVenta");

		var datos = new FormData();
		datos.append("idVenta", idVenta);

		$.ajax({

		  url:"ajax/ventas.ajax.php",
		  method: "POST",
		  data: datos,
		  cache: false,
	      contentType: false,
	      processData: false,
	      success: function(respuesta){

	      		

	      }

	  	})

	})

/*=============================================
RANGO DE FECHAS
=============================================*/

	$('#daterange-btn').daterangepicker(
	  {
	    ranges   : {
	      'Hoy'       		: [moment(), moment()],
	      'Ayer'   			: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	      'Últimos 7 días' 	: [moment().subtract(6, 'days'), moment()],
	      'Últimos 30 días'	: [moment().subtract(29, 'days'), moment()],
	      'Este mes'  		: [moment().startOf('month'), moment().endOf('month')],
	      'Último mes'  	: [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	    },
	    startDate			: moment(),
	    endDate  			: moment()
	  },
	  function (start, end) {
	    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

	    var fechaInicial = start.format('YYYY-MM-DD');
  
	    var fechaFinal = end.format('YYYY-MM-DD');

	    var capturarRango = $("#daterange-btn span").html();
	   
	   	localStorage.setItem("capturarRango", capturarRango);

	   	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	  }

	)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

	$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

		localStorage.removeItem("capturarRango");
		localStorage.clear();
		window.location = "ventas";
	})

/*=============================================
CAPTURAR HOY
=============================================*/

	$(".daterangepicker.opensleft .ranges li").on("click", function(){

		var textoHoy = $(this).attr("data-range-key");

		if(textoHoy == "Hoy"){

			var d = new Date();
			
			var dia = d.getDate();
			var mes = d.getMonth()+1;
			var año = d.getFullYear();

			// if(mes < 10){

			// 	var fechaInicial = año+"-0"+mes+"-"+dia;
			// 	var fechaFinal = año+"-0"+mes+"-"+dia;

			// }else if(dia < 10){

			// 	var fechaInicial = año+"-"+mes+"-0"+dia;
			// 	var fechaFinal = año+"-"+mes+"-0"+dia;

			// }else if(mes < 10 && dia < 10){

			// 	var fechaInicial = año+"-0"+mes+"-0"+dia;
			// 	var fechaFinal = año+"-0"+mes+"-0"+dia;

			// }else{

			// 	var fechaInicial = año+"-"+mes+"-"+dia;
		 //    	var fechaFinal = año+"-"+mes+"-"+dia;

			// }

			dia = ("0"+dia).slice(-2);
			mes = ("0"+mes).slice(-2);

			var fechaInicial = año+"-"+mes+"-"+dia;
			var fechaFinal = año+"-"+mes+"-"+dia;	

	    	localStorage.setItem("capturarRango", "Hoy");

	    	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;



		}

	})

/*=============================================
ABRIR ARCHIVO XML EN NUEVA PESTAÑA
=============================================*/

	$(".abrirXML").click(function(){

		var archivo = $(this).attr("archivo");
		window.open(archivo, "_blank");

	})

/*=============================================
GUARDAR VENTA USANDO COMANDO DEL TECLADO |
=============================================*/

	$(document).on('keyup', function(event) {  
	  if(event.which == 220) { // |
	    $("#btnGuardarVenta").click();
	  }
	});
	$("#btnGuardarVenta").on('click', function() {
	  
	})

/*=============================================
AGREGAR PRODUCTO A LA VENTA CON LA TECLA ENTER
=============================================*/

	// $("#codigoBarras").keypress(function(event) {  
	//   if(event.which == 13) { // q
	//     $("#agregarProducto").click();
	//     $("#codigoBarras").val("");
	//   }
	// });
	
/*=============================================
MOSTRAR FACTURA SI SE SELECCIONA EL CHECK
=============================================*/

	$(".facturacion").on("ifChecked",function(){

		var factura = $('#nuevaVenta').val();

		$("#facturaLegal").attr("hidden", false);
		$("#nuevaFactura").val(factura);

	})

	$(".facturacion").on("ifUnchecked",function(){

		$("#facturaLegal").attr("hidden", true);
		$("#nuevaFactura").val("");
	
	})

/*=============================================
MOSTRAR CONDUCTOR SI SE SELECCIONA EL CHECK
=============================================*/

	$("#delivery").on("ifChecked",function(){

		$("#conductor").attr("hidden", false);

	})

	$("#delivery").on("ifUnchecked",function(){

		$("#conductor").attr("hidden", true);
		
	})

/*=============================================
MOSTRAR MODAL CALCULADORA EN FOCUS DEL INPUT DE EFECTIVO
=============================================*/

	// $('#nuevoValorEfectivo').focus(function(){
	//     //open bootsrap modal
	//     $('#modalCalculadora').modal({
	//        show: true
	//     });	    
	// });

/*=============================================
LIMPIAR VALOR DEL OUTPUT DE LA CALCULADORA CON EL BOTON OK Y PASARLO AL CAMPO DE EFECTIVO
=============================================*/

	$(".limpiar").click(function(){

		$("#output-value").html("");

	});

/*=============================================
PASAR VALOR DE CALCULADORA A INPUT DE EFECTIVO
=============================================*/

	// var valorEfectivo = document.getElementById("output-value");
	// var botonResultado = document.getElementById("resultado");

	// var campoEfectivo = document.getElementById("nuevoValorEfectivo");


	// function valor() {
	// 	campoEfectivo.value = reverseNumberFormat(valorEfectivo.innerText).toString();
	// }

	// botonResultado.addEventListener("click", valor);

	// $(".formularioVenta").on("keyup", "input#nuevoValorEfectivo", function(){

	// 	var efectivo = $(this).val();

	// 	var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

	// 	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

	// 	nuevoCambioEfectivo.val(cambio);

	// })

/*=============================================
FOCUS AUTOMATICO EN CAMPO BUSQUEDA DE CODIGO DE BARRAS
=============================================*/

	$("#codigoBarras").focus();

/*=============================================
HACER FOCO EN EL CAMPO CODIGO DE BARRAS CON LA TECLA F2
=============================================*/

	$(document).on('keyup', function(event) {  
	  if(event.which == 113) { // F2
	    $("#codigoBarras").focus();
	  }
	});
	
