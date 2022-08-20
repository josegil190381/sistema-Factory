/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

	// $.ajax({

	// 	url: "ajax/datatable-productos.ajax.php",
	// 	success:function(respuesta){
			
		
	// 	}

	// })

	var perfilOculto = $("#perfilOculto").val();

	$('.tablaProductos').DataTable( {
	    "ajax": "ajax/datatable-productos.ajax.php?perfilOculto="+perfilOculto,
	    "deferRender": true,
		"retrieve": true,
		"processing": true,
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

		dom: "Bfrtip",

		buttons: ['colvis'],

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
				"buttons": {
					"copy": "Copiar",
					"colvis": "Ocultar Columnas"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}

		}

	} );

/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
	$("#nuevaCategoria").change(function(){

		var idCategoria = $(this).val();

		var datos = new FormData();
	  	datos.append("idCategoria", idCategoria);

	  	$.ajax({

	      url:"ajax/productos.ajax.php",
	      method: "POST",
	      data: datos,
	      cache: false,
	      contentType: false,
	      processData: false,
	      dataType:"json",
	      success:function(respuesta){

	      	if(!respuesta){

	      		var nuevoCodigo = idCategoria+"01";
	      		$("#nuevoCodigo").val(nuevoCodigo);

	      	}else{

	      		var nuevoCodigo = Number(respuesta["codigo"]) + 1;
	          	$("#nuevoCodigo").val(nuevoCodigo);

	      	}
	                
	      }

	  	})

	})

/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/

	$("#nuevoPrecioCompra, #editarPrecioCompra").change(function(){

		if($(".porcentaje").prop("checked")){

			var valorPorcentaje = $(".nuevoPorcentaje").val();
			
			var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

			var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

			$("#nuevoPrecioVenta").val(porcentaje);
			$("#nuevoPrecioVenta").prop("readonly",true);

			$("#editarPrecioVenta").val(editarPorcentaje);
			$("#editarPrecioVenta").prop("readonly",true);

		}

	})

/*=============================================
CAMBIO DE PORCENTAJE
=============================================*/
	$(".nuevoPorcentaje").change(function(){

		if($(".porcentaje").prop("checked")){

			var valorPorcentaje = $(this).val();
			
			var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

			var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

			$("#nuevoPrecioVenta").val(porcentaje);
			$("#nuevoPrecioVenta").prop("readonly",true);

			$("#editarPrecioVenta").val(editarPorcentaje);
			$("#editarPrecioVenta").prop("readonly",true);

		}

	})

	$(".porcentaje").on("ifUnchecked",function(){

		$("#nuevoPrecioVenta").prop("readonly",false);
		$("#editarPrecioVenta").prop("readonly",false);

	})

	$(".porcentaje").on("ifChecked",function(){

		$("#nuevoPrecioVenta").prop("readonly",true);
		$("#editarPrecioVenta").prop("readonly",true);

	})

/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/

	$(".nuevaImagen").change(function(){

		var imagen = this.files[0];
		
		/*=============================================
	  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	  	=============================================*/

	  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

	  		$(".nuevaImagen").val("");

	  		 swal({
			      title: "Error al subir la imagen",
			      text: "¡La imagen debe estar en formato JPG o PNG!",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });

	  	}else if(imagen["size"] > 2000000){

	  		$(".nuevaImagen").val("");

	  		 swal({
			      title: "Error al subir la imagen",
			      text: "¡La imagen no debe pesar más de 2MB!",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });

	  	}else{

	  		var datosImagen = new FileReader;
	  		datosImagen.readAsDataURL(imagen);

	  		$(datosImagen).on("load", function(event){

	  			var rutaImagen = event.target.result;

	  			$(".previsualizar").attr("src", rutaImagen);

	  		})

	  	}
	})

/*=============================================
EDITAR PRODUCTO
=============================================*/

	$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function(){

		var idProducto = $(this).attr("idProducto");
		
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
	          
	          var datosCategoria = new FormData();
	          datosCategoria.append("idCategoria",respuesta["id_categoria"]);

	           $.ajax({

	              url:"ajax/categorias.ajax.php",
	              method: "POST",
	              data: datosCategoria,
	              cache: false,
	              contentType: false,
	              processData: false,
	              dataType:"json",
	              success:function(respuesta){
	                  
	                  $("#editarCategoria").val(respuesta["id"]);
	                  $("#editarCategoria").html(respuesta["categoria"]);

	              }

	         	})


	           var datosProveedor = new FormData();
		       datosProveedor.append("idProveedor",respuesta["id_proveedor"]);

		           $.ajax({

		              url:"ajax/proveedores.ajax.php",
		              method: "POST",
		              data: datosProveedor,
		              cache: false,
		              contentType: false,
		              processData: false,
		              dataType:"json",
		              success:function(respuesta){
		                  
		                  $("#editarProveedor").val(respuesta["id"]);
		                  $("#editarProveedor").html(respuesta["nombre"]);

	              	  }

	             	})



	           $("#editarCodigo").val(respuesta["codigo"]);

	           $("#editarCodigoBarras").val(respuesta["codigo_barras"]);

	           $("#editarFacturaCompra").val(respuesta["factura"]);

	           $("#editarDescripcion").val(respuesta["descripcion"]);
	           
	           $("#editarStock").val(respuesta["stock"]);

	           $("#editarPrecioCompra").val(respuesta["precio_compra"]);

	           $("#editarPrecioVenta").val(respuesta["precio_venta"]);

	           $("#editarFechaVencimiento").val(respuesta["fecha_vencimiento"]);

	           if(respuesta["imagen"] != ""){

	           	$("#imagenActual").val(respuesta["imagen"]);

	           	$(".previsualizar").attr("src",  respuesta["imagen"]);

	           }

	      }

	  })

	})

/*=============================================
COMPRAR STOCK
=============================================*/

	$(".tablaProductos tbody").on("click", "button.btnNuevoStock", function(){

		var idProducto = $(this).attr("idProducto");
		
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
	          

	           $("#codigoProducto").val(respuesta["codigo"]);

	           $("#descripcionProducto").val(respuesta["descripcion"]);

	           $("#nuevoPrecioCompraStock").val(respuesta["precio_compra"]);

	           

	            

	      }

	  })

	})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

	$(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function(){

		var idProducto = $(this).attr("idProducto");
		var codigo = $(this).attr("codigo");
		var imagen = $(this).attr("imagen");
		var idDescripcion = $(this).attr("idDescripcion");
		
		swal({

			title: '¿Está seguro de borrar el producto?',
			text: idDescripcion,
			type: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        cancelButtonText: 'Cancelar',
	        confirmButtonText: 'Si, borrar producto!'
	        }).then(function(result) {
	        if (result.value) {

	        	window.location = "index.php?ruta=productos&idProducto="+idProducto+"&imagen="+imagen+"&codigo="+codigo;

	        }


		})

	})

/*=============================================
ABRIR MODAL AGREGAR CATEGORIA DENTRO MODAL AGREGAR PRODUCTO
=============================================*/

	// $("#modalAgregarCategoria").on('show.bs.modal', function (e) {
		
 //    $("#modalAgregarProducto").modal("hide");
		
	// });

/*=============================================
AGREGAR LINEA DE PESO
=============================================*/
	
	$(document).on('click', '.eliminarLineaPeso', function(event) {
		event.preventDefault();
		
		$(this).closest('.lineaPeso').remove();

	});

	$(document).on('click', '.agregarPeso', function(event) {
		event.preventDefault();

		$('.pegar-linea-peso').append('<div class="form-group row lineaPeso">\
									 <div class="col-xs-6">\
				                        <div class="input-group">\
				                          <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>\
				                          <input type="text" class="form-control input-sm" id="" name="descripcionPeso[]" required placeholder="Descripción">\
				                        </div>\
				                      </div>\
				                      <div class="col-xs-4">\
				                        <div class="input-group">\
				                          <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>\
				                          <input type="text" class="form-control input-sm" id="" name="simboloPeso[]" required placeholder="Símbolo">\
				                        </div>\
				                      </div>\
				                      <div class="col-xs-2">\
				                        <div class="input-group">\
				                          <button class="btn btn-danger eliminarLineaPeso"> - </button>\
				                        </div>\
				                      </div>\
				                    </div>');


	});

/*=============================================
AGREGAR LINEA DE TALLA
=============================================*/
	
	$(document).on('click', '.eliminarLineaTalla', function(event) {
		event.preventDefault();
		
		$(this).closest('.lineaTalla').remove();

	});

	$(document).on('click', '.agregarTalla', function(event) {
		event.preventDefault();

		$('.pegar-linea-talla').append('<div class="form-group row lineaTalla">\
									 <div class="col-xs-6">\
				                        <div class="input-group">\
				                          <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>\
				                          <input type="text" class="form-control input-sm" id="" name="descripcionPeso[]" required placeholder="Descripción">\
				                        </div>\
				                      </div>\
				                      <div class="col-xs-4">\
				                        <div class="input-group">\
				                          <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>\
				                          <input type="text" class="form-control input-sm" id="" name="simboloPeso[]" required placeholder="Símbolo">\
				                        </div>\
				                      </div>\
				                      <div class="col-xs-2">\
				                        <div class="input-group">\
				                          <button class="btn btn-danger eliminarLineaTalla"> - </button>\
				                        </div>\
				                      </div>\
				                    </div>');


	});

/*=============================================
AGREGAR LINEA DE COLOR
=============================================*/
	
	$(document).on('click', '.eliminarLineaColor', function(event) {
		event.preventDefault();
		
		$(this).closest('.lineaColor').remove();

	});

	$(document).on('click', '.agregarColor', function(event) {
		event.preventDefault();

		$('.pegar-linea-color').append('<div class="form-group row lineaColor">\
									 <div class="col-xs-6">\
				                        <div class="input-group">\
				                          <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>\
				                          <input type="text" class="form-control input-sm" id="" name="descripcionColor[]" required placeholder="Descripción">\
				                        </div>\
				                      </div>\
				                      <div class="col-xs-4">\
				                        <div class="input-group">\
				                          <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>\
				                          <input type="text" class="form-control input-sm" id="" name="simboloColor[]" required placeholder="Símbolo">\
				                        </div>\
				                      </div>\
				                      <div class="col-xs-2">\
				                        <div class="input-group">\
				                          <button class="btn btn-danger eliminarLineaColor"> - </button>\
				                        </div>\
				                      </div>\
				                    </div>');


	});

/*=============================================
BORRAR CONFIG PRODUCTO
=============================================*/

	$(document).on("click", ".btnEliminarConfigProducto", function(){
		

		// alert("prueba");

		var idConfigProducto = $(this).attr("idConfigProducto");
				
		swal({

			title: '¿Está seguro de borrar el Ajuste?',
			type: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        cancelButtonText: 'Cancelar',
	        confirmButtonText: 'Si borrar!'
	        }).then(function(result) {
	        if (result.value) {

	        	window.location = "index.php?ruta=config-productos&idConfigProducto="+idConfigProducto;

	        }


		})

	})
