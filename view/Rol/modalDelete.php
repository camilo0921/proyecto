<?php
   while ($roles=pg_fetch_assoc($rol)){
?>
     
<form action="<?php echo getUrl("Rol","Rol","postDelete"); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="rol_id" value="<?php echo $roles['rol_id']  ?>">
    <div class="modal-body">
      <div class="col-md-12 form-group">
        <label>Nombre</label>
          <input type="text" name="rol_desc" class="form-control validarRol" value="<?php echo $roles['rol_desc'] ?>" readonly="">
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
      <button type="submit" name="Enviar" value="Enviar" class="btn btn-danger">ELIMINAR</button>
    </div>
                  
</form>

<?php
 }
?> 

 