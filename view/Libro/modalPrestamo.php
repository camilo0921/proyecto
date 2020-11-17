<!--<div class="modal fade" id="modalPrestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          
          <div id="contenido-modal3">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">REGISTRAR PRESTAMO LIBRO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php //echo getUrl("PrestamoLibroUsuario","PrestamoLibroUsuario","postCreate"); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-row">
                <div class="col-md-2">
                  <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
                </div>
                <div class="col-sm-4">
                    <input type="date" class="form-control validarFecha" tipo="prestamo_fecha"  name="prestamo_fecha" id="prestamo_fecha" placeholder="Fecha de Prestamo" >
                </div><br><br><br>

                <div class="col-md-2">
                    <label class="col-form-label"><strong>NOMBRE LIBRO</strong></label>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" name="libro_id">
                        <option>Seleccione...</option>
                        <?php
                              
                        /*while ($lib=pg_fetch_assoc($libro)){
                          if($preL['libro_id']==$lib['libro_id']){
                            $selected="selected";
                          }else{
                            $selected="";
                          }
                            echo "<option value='".$lib['libro_id']."'$selected>".$lib['libro_nombre']."</option>";
                        }*/

                      ?>

                    </select>
              </div><br><br><br>
                
            </div>

            <div class="form-row">
                <div class="col-md-2">
                    <label class="col-form-label"><strong>NOMBRE USUARIO</strong></label>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="nombre" class="form-control" value="<?php //echo $_SESSION['nombre']?>" disabled>
                    <input type="hidden" name="usuario_id" class="form-control" value="<?php //echo $_SESSION['id']?>">
                   
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
</div>-->


<!--<form action="<?php /*echo getUrl("PrestamoLibro","PrestamoLibro","postCreate"); ?>" method="post" enctype="multipart/form-data">
  <div class="modal-body">
    <div class="form-row">
      <div class="col-md-2">
        <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $preL['prestamo_fecha'] ?>" type="date" class="form-control" placeholder="Fecha Prestamo Libro" name="prestamo_fecha" disabled>
      </div>
      <div class="col-md-2">
        <label class="col-form-label"><strong>NOMBRE LIBRO</strong></label>
      </div>
      <div class="col-sm-4">
        <select class="form-control" name="libro_id" disabled>
          <option>Seleccione...</option>
          <?php
                      
            while ($lib=pg_fetch_assoc($libro)){
              if($preL['libro_id']==$lib['libro_id']){
                $selected="selected";
              }else{
                $selected="";
              }
                echo "<option value='".$lib['libro_id']."'$selected>".$lib['libro_nombre']."</option>";
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
        <select class="form-control" name="usuario_id" disabled>
          <option>Seleccione...</option>
          <?php

            while($usu=pg_fetch_assoc($usuario)){
              if($preL['usuario_id']==$usu['usuario_id']){
                $selected="selected";
              }else{
                $selected="";
              }
                echo "<option value='".$usu['usuario_id']."' $selected>".$usu['usuario_nombre']."</option>";
              }*/

          ?>
                  
        </select>
      </div><br><br><br>  
    </div>        

    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Registrar</button>
    </div>
  </div>              
</form>-->