<?php
  while ($preL=pg_fetch_assoc($prestamolibro)) {
?>

<form action="<?php echo getUrl("PrestamoLibro","PrestamoLibro","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="prestamo_id" value="<?php echo $preL['prestamo_id']?>">
            <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
            <input value="<?php echo $preL['prestamo_fecha'] ?>" type="date" name="prestamo_fecha" class="form-control validarFecha">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-form-label"><strong>LIBRO</strong></label>
              <select name="libro_id" id="libro_id" class="form-control">
                <option value="">Seleccione...</option>
                  <?php

                      while($lib=pg_fetch_assoc($libro)){
                        if($lib['libro_id']==$preL['libro_id']){
                          echo "<option value='".$lib['libro_id']."' selected>".$lib['libro_nombre']."</option>";
                        }else{
                          echo "<option value='".$lib['libro_id']."'>".$lib['libro_nombre']."</option>";
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
                        if($usu['usuario_id']==$preL['usuario_id']){
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