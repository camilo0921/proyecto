<?php
  while ($preR=pg_fetch_assoc($prestamorevista)) {
?>

<form action="<?php echo getUrl("PrestamoRevista","PrestamoRevista","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="prestamor_id" value="<?php echo $preR['prestamor_id']?>">
            <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
            <input value="<?php echo $preR['prestamo_fecha'] ?>" type="date" name="prestamo_fecha" class="form-control validarFecha">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-form-label"><strong>REVISTA</strong></label>
              <select name="revista_id" id="revista_id" class="form-control">
                <option value="">Seleccione...</option>
                  <?php

                      while($rev=pg_fetch_assoc($revista)){
                        if($rev['revista_id']==$preR['revista_id']){
                          echo "<option value='".$rev['revista_id']."' selected>".$rev['revista_nombre']."</option>";
                        }else{
                          echo "<option value='".$rev['revista_id']."'>".$rev['revista_nombre']."</option>";
                        }
                        
                      }
                  ?>
              </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-form-label"><strong>USUARIO</strong></label>
              <select name="usuario_id" id="usuario_id" class="form-control">
                <option value="">Seleccione...</option>
                  <?php
                      while($usu=pg_fetch_assoc($usuario)){
                        if($usu['usuario_id']==$preR['usuario_id']){
                          echo "<option value='".$usu['usuario_id']."' selected>".$usu['usuario_nombre']."</option>";
                        }else{
                          echo "<option value='".$usu['usuario_id']."'>".$usu['usuario_nombre']."</option>";
                        }
                      }
                  ?>
              </select>
          </div>
        </div>
    </div>
    
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Editar</button>
    </div>

</form>
 
<?php
  } 
?>