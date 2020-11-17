<?php
  while ($preL=pg_fetch_assoc($prestamolibro)) {
?>

<div class="modal-body ">
  <div class="container">
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