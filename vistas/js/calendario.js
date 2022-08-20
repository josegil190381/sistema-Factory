/*=============================================
FULL CALENDAR	
=============================================*/
			
	$(function () {

    
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    $('#calendario').fullCalendar({

      

      navLinks: true,
      eventLimit: true,
      aspectRatio: 2,
      selectable: true,
      selectHelper: true,

      header    : {
        left  : 'prev,next today prevYear,nextYear',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },

      buttonText: {
        today: 'hoy',
        month: 'mes',
        week : 'semana',
        day  : 'día'
      },

      

      dayClick:function(date,jsEvent,view){

        $("#btnAgregar").prop("disabled", false);
        $("#btnModificar").prop("disabled", true);
        $("#btnEliminar").prop("disabled", true);

        LimpiarFormulario();

        $("#txtFecha").val(date.format());
        $("#modalEventos").modal();

      },


      events    : "vistas/modulos/eventos/eventos.php",

      eventClick:function(calEvent,jsEvent,view){

        $("#btnAgregar").prop("disabled", true);
        $("#btnModificar").prop("disabled", false);
        $("#btnEliminar").prop("disabled", false);

        //Titulo del Evento
        $("#tituloEvento").html(calEvent.title);

        //Mostrar la Info del Evento
        $("#txtId").val(calEvent.id);
        $("#txtTitulo").val(calEvent.title);
        $("#txtDescripcion").val(calEvent.descripcion);
        $("#texColor").val(calEvent.color);

        FechaHora = calEvent.start._i.split(" ");

        $("#txtFecha").val(FechaHora[0]);
        $("#txtHora").val(FechaHora[1]);


        $("#modalEventos").modal();

      },

      editable  : true,

      eventDrop:function(calEvent){

        $("#txtId").val(calEvent.id);
        $("#txtTitulo").val(calEvent.title);
        $("#texColor").val(calEvent.color);
        $("#txtDescripcion").val(calEvent.descripcion);

        var fechaHora = calEvent.start.format().split("T");

        $("#txtFecha").val(fechaHora[0]);
        $("#txtHora").val(fechaHora[1]);

        RecolectarDatosGUI();
        EnviarInformacion("modificar",NuevoEvento, true);



      },

      droppable : true, // this allows things to be dropped onto the calendar !!!
      // drop      : function (date, allDay) { // this function is called when something is dropped

      //   // retrieve the dropped element's stored Event Object
      //   var originalEventObject = $(this).data('eventObject')

      //   // we need to copy it, so that multiple events don't have a reference to the same object
      //   var copiedEventObject = $.extend({}, originalEventObject)

      //   // assign it the date that was reported
      //   copiedEventObject.start           = date
      //   copiedEventObject.allDay          = allDay
      //   copiedEventObject.backgroundColor = $(this).css('background-color')
      //   copiedEventObject.borderColor     = $(this).css('border-color')

      //   // render the event on the calendar
      //   // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
      //   $('#calendario').fullCalendar('renderEvent', copiedEventObject, true)

      //   // is the "remove after drop" checkbox checked?
      //   if ($('#drop-remove').is(':checked')) {
      //     // if so, remove the element from the "Draggable Events" list
      //     $(this).remove()
      //   }

      // }

    })

  })


  var NuevoEvento;


  $('#btnAgregar').click(function(){

      RecolectarDatosGUI();
      EnviarInformacion("agregar",NuevoEvento);
   
  });

  $('#btnEliminar').click(function(){

      RecolectarDatosGUI();
      EnviarInformacion("eliminar",NuevoEvento);
      
  });

  $('#btnModificar').click(function(){

      RecolectarDatosGUI();
      EnviarInformacion("modificar",NuevoEvento);
      
  });


  function RecolectarDatosGUI(){

      NuevoEvento = {

          id:$("#txtId").val(),
          title:$('#txtTitulo').val(),
          start:$('#txtFecha').val()+' '+$('#txtHora').val(),
          color:$('#txtColor').val(),
          descripcion:$('#txtDescripcion').val(),
          textColor:'#FFFFFF',
          end:$('#txtFecha2').val()+' '+$('#txtHora2').val(),
          
      };


  }

  function EnviarInformacion(accion, objEvento, modal){

    $.ajax({
        type: "POST",
        url: "vistas/modulos/eventos/eventos.php?accion="+accion,
        data: objEvento,
        success:function(msg){

          if (msg) {

              $('#calendario').fullCalendar("refetchEvents" );

              if (!modal) {

                 $('#modalEventos').modal('toggle');

              }

          }

        },

        error:function(){
          alert("Hay un error ...");

        }

    });

  }

  function LimpiarFormulario(){

    $("#tituloEvento").html('');
    $("#txtId").val('');
    $("#txtTitulo").val('');
    $("#texColor").val('');
    $("#txtDescripcion").val('');






  }

  