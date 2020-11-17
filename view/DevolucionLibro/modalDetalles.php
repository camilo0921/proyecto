<?php
  while ($devL=pg_fetch_assoc($devolucionlibro)) {
?>

<div class="modal-body ">
  <div class="container">
    <div class="form-row">
      <div class="col-md-2">
        <label class="col-form-label"><strong>FECHA DEVOLUCION</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $devL['devolucion_fecha'] ?>" type="date" class="form-control" placeholder="Fecha Prestamo Libro" name="prestamo_fecha" disabled>
      </div>

      <div class="col-md-2">
        <label class="col-form-label"><strong>NOMBRE LIBRO</strong></label>
      </div>
      <div class="col-sm-4">
        <select class="form-control" name="libro_id" disabled>
          <option>Seleccione...</option>
          <?php
                      
            while ($lib=pg_fetch_assoc($libro)){
              if($devL['libro_id']==$lib['libro_id']){
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
              if($devL['usuario_id']==$usu['usuario_id']){
                $selected="selected";
              }else{
                $selected="";
              }
                echo "<option value='".$usu['usuario_id']."' $selected>".$usu['usuario_nombre']."</option>";
              }

          ?>
                  
        </select>
      </div><br><br><br>  
    </div>

    <center>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </center>

    

                  
<?php
  } 
?>