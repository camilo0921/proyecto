<?php
  while ($preR=pg_fetch_assoc($prestamorevista)) {
?>

<div class="modal-body ">
  <div class="container">
    <div class="form-row">
      <div class="col-md-2">
        <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $preR['prestamo_fecha'] ?>" type="date" class="form-control" placeholder="Fecha Prestamo Revista" name="prestamo_fecha" disabled>
      </div>

      <div class="col-md-2">
        <label class="col-form-label"><strong>NOMBRE REVISTA</strong></label>
      </div>
      <div class="col-sm-4">
        <select class="form-control" name="revista_id" disabled>
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
        <select class="form-control" name="usuario_id" disabled>
          <option>Seleccione...</option>
          <?php

            while($usu=pg_fetch_assoc($usuario)){
              if($preR['usuario_id']==$usu['usuario_id']){
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