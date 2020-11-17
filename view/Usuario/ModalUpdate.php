<?php

  while ($usu=pg_fetch_assoc($usuario)){
  
?>

<form action="<?php echo getUrl("Usuario","Usuario","postCreate"); ?>" method="post" enctype="multipart/form-data">

  <div class="row">
    <div class="col-md-6">
      <div class="form group">
        <input type="hidden" name="usuario_id" value="<?php echo $usu['usuario_id']?>">
        <label class="col-form-label">Nombre</label>
        <input value="<?php echo $usu['usuario_nombre'] ?>" type="text" name="usuario_nombre" class="form-control validarUsu">
      </div>
    </div>
  
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-form-label">Apellidos</label>
        <input value="<?php echo $usu['usuario_apellidos'] ?>" type="text" name="usuario_apellidos" class="form-control validacion usuario_apellidos" >
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label class="col-form-label">Numero identificacion</label>
        <input value="<?php echo $usu['usuario_identificacion'] ?>" type="text" name="usuario_identificacion" class="form-control usuario_identificacion">
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label class="col-form-label">Contraseña</label>
        <input value="<?php echo $usu['usuario_contrasena'] ?>" type="text" name="usuario_contrasena" class="form-control usuario_contraseña">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label class="col-form-label">Correo</label>
        <input value="<?php echo $usu['usuario_correo'] ?>" type="text" name="usuario_correo" class="form-control usuario_correo">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label class="col-form-label">Telefono</label>
        <input value="<?php echo $usu['usuario_telefono'] ?>" type="text" name="usuario_telefono" class="form-control  usuario_telefono" >
      </div>
    </div>
      
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-form-label">Fecha Nacimiento</label>
        <input value="<?php echo $usu['usuario_fecha_nac'] ?>" type="date" name="usuario_fecha_nac" class="form-control  usuario_fecha_nac" >
      </div>
    </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label class="col-form-label"><strong>ROL</strong></label>
          <select name="rol_id" id="rol_id" class="form-control">
            <option value="">Seleccione...</option>
            <?php

              while ($roles=pg_fetch_assoc($rol)){
                if($roles['rol_id']==$usu['rol_id']){
                  echo "<option value='".$roles['rol_id']."' selected>".$roles['rol_desc']."</option>";
                }else{
                  echo "<option value='".$roles['rol_id']."'>".$roles['rol_desc']."</option>";
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
               
<?php } ?>


           