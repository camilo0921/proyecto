<?php
  while ($roles=pg_fetch_assoc($rol)){
?>

<form action="<?php echo getUrl("Rol","Rol","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="rol_id" value="<?php echo $roles['rol_id']?>">
            <label class="col-form-label"><strong>NOMBRE ROL</strong></label>
            <input value="<?php echo $roles['rol_desc'] ?>" type="text" name="rol_desc" class="form-control validarRol">
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