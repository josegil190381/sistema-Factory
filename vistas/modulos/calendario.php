<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Calendario
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Calendario</li>
    
    </ol>

  </section>

  <section class="content">

      <div class="row">

        <div class="col-xs-12">

          <div class="box box-primary">

            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendario">
                
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

</div>


<!--=====================================
MODAL EVENTO
======================================-->

  <div id="modalEventos" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="" id="tituloEvento"></h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA LA FECHA Y ID  -->
              
              <input type="hidden" class="form-control input-lg" name="txtFecha" id="txtFecha">

              <input type="hidden" class="form-control input-lg" name="txtId" id="txtId" hidden="">
                 
             

              <!-- ENTRADA PARA EL TITULO Y HORA -->

              <div class="form-row">
                
                <div class="form-group col-md-8">

                  <label>Título</label>
                
                  <div class="input-group">
                 
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="txtTitulo" id="txtTitulo" placeholder="Título del Evento">

                  </div>

                </div>

                <div class="form-group col-md-4">

                  <label>Hora</label>
                
                  <div class="input-group clockpicker" data-autoclose="true">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="txtHora" id="txtHora" value="12:00">

                  </div>

                </div>

              </div>
              
              
              <!-- ENTRADA PARA LA DESCRIPCION  -->

              <div class="form-row">
                
                <div class="form-group col-md-12">

                  <label>Descripción</label>
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" rows="3" ></textarea>
                   
                  </div>

                </div>

              </div>
              
              

              <!-- ENTRADA PARA EL COLOR -->

              <div class="form-row">
                
                <div class="form-group col-md-12">

                  <label>Color</label>
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input class="form-control" type="color" name="txtColor" id="txtColor" value="#FF0000" style="height: 35px;">

                  </div>

                </div>

              </div>
              
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" id="btnAgregar" class="btn btn-success" >Agregar</button>
            <button type="button" id="btnModificar" class="btn btn-warning" >Modificar</button>
            <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Cancelar</button>

          </div>
        
      </div>

    </div>

  </div>

