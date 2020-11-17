<?php
  while ($idi=pg_fetch_assoc($idioma)) {
?>
    
<form action="<?php echo getUrl("Idioma","Idioma","postDelete"); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="idioma_id" value="<?php echo $idi['idioma_id']  ?>">
    <div class="modal-body">
      <div class="col-md-12 form-group">
        <label>Nombre</label>
          <input type="text" name="idioma_desc" class="form-control validarIdi" value="<?php echo $idi['idioma_desc'] ?>" readonly="">
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

 