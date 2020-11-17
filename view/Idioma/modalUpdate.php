<?php
  while ($idi=pg_fetch_assoc($idioma)){
?>

<form action="<?php echo getUrl("Idioma","Idioma","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="idioma_id" value="<?php echo $idi['idioma_id']?>">
            <label class="col-form-label"><strong>NOMBRE IDIOMA</strong></label>
            <input value="<?php echo $idi['idioma_desc'] ?>" type="text" name="idioma_desc" class="form-control validarIdi">
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