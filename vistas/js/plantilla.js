/*=============================================
SideBar Menu
=============================================*/

	$('.sidebar-menu').tree()

/*=============================================
Data Table
=============================================*/

	$(".tablas").DataTable({

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
                'TOTAL:  Gs. ' + numFormat(pageTotal)
            );
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

	});

/*=============================================
Data Table
=============================================*/

	$(".tablasVerVentas").DataTable({

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
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            var numFormat = $.fn.dataTable.render.number( '\.', ',' ).display;
	       	       
            $( api.column( 4 ).footer() ).html(
                'TOTAL:  Gs. ' + numFormat(pageTotal)
            );
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

	});

/*=============================================
Data Table Clientes
=============================================*/

	// $(".tablasCliente").DataTable({

	// 	"order": [[ 10, "desc" ]],

	// 	"language": {

	// 		"sProcessing":     "Procesando...",
	// 		"sLengthMenu":     "Mostrar _MENU_ registros",
	// 		"sZeroRecords":    "No se encontraron resultados",
	// 		"sEmptyTable":     "Ningún dato disponible en esta tabla",
	// 		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
	// 		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
	// 		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	// 		"sInfoPostFix":    "",
	// 		"sSearch":         "Buscar:",
	// 		"sUrl":            "",
	// 		"sInfoThousands":  ",",
	// 		"sLoadingRecords": "Cargando...",
	// 		"oPaginate": {
	// 		"sFirst":    "Primero",
	// 		"sLast":     "Último",
	// 		"sNext":     "Siguiente",
	// 		"sPrevious": "Anterior"
	// 		},
	// 		"oAria": {
	// 			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	// 			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	// 		}

	// 	}

	// });

/*=============================================
Data Table Gastos
=============================================*/

	$(".tablasGastos").DataTable({

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
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            var numFormat = $.fn.dataTable.render.number( '\.', ',' ).display;
	       	       
            $( api.column( 4 ).footer() ).html(
                'TOTAL:  Gs. ' + numFormat(pageTotal)
            );
        },

		"order": [[ 5, "desc" ]],

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

	});

/*=============================================
Data Table Proveedores
=============================================*/

	$(".tablasProveedor").DataTable({

		"order": [[ 10, "desc" ]],

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

	});

/*=============================================
Data Table Camion
=============================================*/

	$(".tablaCargaCamion").DataTable({

		

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

	});

/*=============================================
Data Table Delivery
=============================================*/

	$(".tablaDelivery").DataTable({

		

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

	});

/*=============================================
Data Table Compras
=============================================*/

	$(".tablasCompra").DataTable({

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
                'TOTAL:  Gs. ' + numFormat(pageTotal)
            );
        },

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

	});

/*=============================================
Data Table Compras Otros
=============================================*/

	$(".tablasCompraOtros").DataTable({
	
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

	});

/*=============================================
 //iCheck for checkbox and radio inputs
=============================================*/

	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	  checkboxClass: 'icheckbox_minimal-blue',
	  radioClass   : 'iradio_minimal-blue'
	})

/*=============================================
 //input Mask
=============================================*/

	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
	//Datemask2 mm/dd/yyyy
	$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
	//Money Euro
	$('[data-mask]').inputmask()

/*=============================================
CORRECCIÓN BOTONERAS OCULTAS BACKEND	
=============================================*/

	//if(window.matchMedia("(max-width:767px)").matches){
		
		//$("body").removeClass('sidebar-collapse');

	//}else{

		//$("body").addClass('sidebar-collapse');

	//}

/*=============================================
SELECT 2	
=============================================*/
    
    $('.select2').select2()

/*=============================================
TOOLTIP
=============================================*/

	$('[data-toggle="tooltip"]').tooltip();

/*=============================================
CLOCKPICKER
=============================================*/

	$('.clockpicker').clockpicker();

/*=============================================
DATEMASK dd/mm/yyy
=============================================*/

    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' });

/*=============================================
DATEPICKER
=============================================*/

    $('#datepicker').datepicker({
      autoclose: true
    })

/*=============================================
Magic Options
=============================================*/

 //    options = {
	// "cursorOuter": "circle-basic",
	// "hoverEffect": "circle-move",
	// "hoverItemMove": false,
	// "defaultCursor": false,
	// "outerWidth": 25,
	// "outerHeight": 25
 //      };
 //    magicMouse(options);

/*=============================================
Magic Mouse Js
=============================================*/

    // "use strict";function magicMouse(e){if((e=e||{}).outerWidth=e.outerWidth||30,e.outerHeight=e.outerHeight||30,e.cursorOuter=e.cursorOuter||"circle-basic",e.hoverEffect=e.hoverEffect||"circle-move",e.hoverItemMove=e.hoverItemMove||!1,e.defaultCursor=e.defaultCursor||!1,"disable"!=e.cursorOuter){var t=document.createElement("div");t.setAttribute("id","magicMouseCursor"),document.body.appendChild(t);var r=document.getElementById("magicMouseCursor")}if(!e.defaultCursor){document.body.style.cursor="none";var s=document.createElement("div");s.setAttribute("id","magicPointer"),document.body.appendChild(s);var o=document.getElementById("magicPointer")}if(r){r.style.width=e.outerWidth+"px",r.style.height=e.outerHeight+"px";var i=e.outerWidth,a=e.outerHeight,n=e.outerWidth,c=e.outerHeight}var u=0,d=0,l=0,m=0,h=!1;document.addEventListener("mousemove",(function(e){l=e.clientX,m=e.clientY,setTimeout(()=>{h||(u=e.clientX-i/2,d=e.clientY-a/2)},50)})),document.querySelectorAll(".magic-hover").forEach((t,r)=>{t.addEventListener("mouseenter",r=>{switch(e.hoverEffect){case"circle-move":f(t),e.hoverItemMove&&b(r,t);break;case"pointer-blur":y(t,"pointer-blur");break;case"pointer-overlay":y(t,"pointer-overlay")}}),t.addEventListener("mouseleave",r=>{switch(t.style.transform="translate3d(0,0,0)",e.hoverEffect){case"circle-move":g();break;case"pointer-blur":p("pointer-blur");break;case"pointer-overlay":p("pointer-overlay")}})});var v=()=>{r&&(r.style.transform="matrix(1, 0, 0, 1, "+u+", "+d+")",r.style.width=i+"px",r.style.height=a+"px"),o&&(o.style.transform="matrix(1, 0, 0, 1, "+l+", "+m+") translate3d(-50%, -50%, 0)"),requestAnimationFrame(v)};requestAnimationFrame(v);const f=e=>{if(h=!0,r){r.style.transition="transform 0.2s, width 0.3s, height 0.3s, border-radius 0.2s",r.classList.add("is-hover");var t=event.currentTarget.getBoundingClientRect();e.classList.contains("magic-hover__square")?(r.classList.add("cursor-square"),u=t.left,d=t.top,i=t.width,a=t.height):(u=t.left,d=t.top,i=t.width,a=t.height)}o&&o.classList.add("is-hover")},g=()=>{h=!1,r&&(i=n,a=c,r.style.transition="transform 0.07s, width 0.3s, height 0.3s, border-radius 0.2s",r.classList.remove("cursor-square"),r.classList.remove("is-hover")),o&&o.classList.remove("is-hover")},y=(e,t)=>{o&&o.classList.add(t)},p=e=>{o&&o.classList.remove(e)},b=(e,t)=>{e.clientX,e.clientY,t.addEventListener("mousemove",e=>{t.style.transform="matrix(1,0,0,1,"+(e.offsetX-e.target.offsetWidth/2)/2+", "+(e.offsetY-e.target.offsetHeight/2)/2+")"})}}

/*=============================================
FOCUS AUTOMATICO EN CAMPO DE USUARIO EN EL LOGIN
=============================================*/

	$("#ingUsuario").focus();


    
