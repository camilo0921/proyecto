<div  class="modal fade" id="modalDescripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
             <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">DETALLES REVISTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="contenido-modal2">
                </div>
              </div>
        </div>
    </div>
</div>

<div  class="modal fade" id="modalPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
             <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">PRESTAMO REVISTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="contenido-modal3">
                </div>
              </div>
        </div>
    </div>
</div>

<div  class="modal fade" id="modalDevolverR" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
             <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">DEVOLUCION REVISTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="contenido-modal4">
                </div>
              </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          
          <div id="contenido-modal">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PRESTAMO REVISTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","postCreate"); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-row">
                <div class="col-md-2">
                  <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
                </div>
                <div class="col-sm-4">
                    <input type="date" class="form-control validarFecha" tipo="prestamo_fecha"  name="prestamo_fecha" id="prestamo_fecha" placeholder="Fecha de Prestamo" >
                </div><br><br><br>

                <div class="col-md-2">
                    <label class="col-form-label"><strong>NOMBRE REVISTA</strong></label>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" name="revista_id">
                        <option>Seleccione...</option>
                        <?php
                              
                        while ($rev=pg_fetch_assoc($revista)){
                          if($preR['revista_id']==$rev['revista_id']){
                            $selected="selected";
                          }else{
                            $selected="";
                          }
                            echo "<option value='".$rev['revista_id']."'$selected>".$rev['revista_nombre']."</option>";
                        }

                      ?>

                    </select>
              </div><br><br><br>
                
            </div>

            <div class="form-row">
                <div class="col-md-2">
                    <label class="col-form-label"><strong>NOMBRE USUARIO</strong></label>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="nombre" class="form-control" value="<?php echo $_SESSION['nombre']?>" disabled>
                    <input type="hidden" name="usuario_id" class="form-control" value="<?php echo $_SESSION['id']?>">
                   
                </div><br><br><br>
               
            </div><br> 
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Registrar</button>
          </div>
                  
        </form>
      </div>
    </div>
  </div>
</div>
