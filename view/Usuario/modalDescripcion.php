<?php

  while ($usu=pg_fetch_assoc($usuario)){
  
?>

<div class="modal-body ">
  <div class="container">
    <div class="form-row">
      <div class="col-md-2">
        <label class="col-form-label"><strong>NOMBRE</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $usu['usuario_nombre'] ?>" type="text" class="form-control" placeholder="Nombre Usuario" name="usuario_nombre" disabled>
      </div>

      <div class="col-md-2">
        <label class="col-form-label"><strong>APELLIDOS</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $usu['usuario_apellidos'] ?>" type="text" class="form-control" placeholder="Apellidos Usuario" name="usuario_apellidos" disabled>
      </div><br><br><br>  
    </div>

    <div class="form-row">
      <div class="col-md-2">
        <label class="col-form-label"><strong>NUMERO IDENTIFICACION</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $usu['usuario_identificacion'] ?>" type="text" class="form-control" placeholder="Identificacion Usuario" name="usuario_identificacion" disabled>
      </div>
    
      <div class="col-md-2">
        <label class="col-form-label"><strong>TELEFONO</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $usu['usuario_telefono'] ?>" type="text" class="form-control" placeholder="Telefono Usuario" name="usuario_telefono" disabled>
      </div><br><br><br>  
    </div>

    <div class="form-row">
      <div class="col-md-2">
        <label class="col-form-label"><strong>FECHA DE NACIMIENTO</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $usu['usuario_fecha_nac'] ?>" type="text" class="form-control" placeholder="Fecha Nacimiento Usuario" name="usuario_fecha_nac" disabled>
      </div>
    
      <div class="col-md-2">
        <label class="col-form-label"><strong>CORREO</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $usu['usuario_correo'] ?>" type="text" class="form-control" placeholder="Correo Usuario" name="usuario_correo" disabled>
      </div><br><br><br>  
    </div> 

    <div class="form-row">
      <div class="col-md-2">
        <label class="col-form-label"><strong>ROL</strong></label>
      </div>
      <div class="col-sm-4">
        <select class="form-control" name="rol_id" disabled>
          <option>Seleccione...</option>
          <?php
                      
            while ($roles=pg_fetch_assoc($rol)){
              if($usu['rol_id']==$roles['rol_id']){
                $selected="selected";
              }else{
                $selected="";
              }
                echo "<option value='".$roles['rol_id']."'$selected>".$roles['rol_desc']."</option>";
            }

          ?>

        </select>
      </div><br><br><br>   
    </div>

    <!--center id="libro_foto">
      <img src="<?php //echo $rev['revista_foto'];?>" name="revista_foto" width="220" heidth="220">
    </center>--> <br> 

    
      <center>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </center>

                  
<?php
  } 
?>