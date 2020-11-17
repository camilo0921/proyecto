<?php
  while ($aniE=pg_fetch_assoc($edicion)) {
?>

<form action="<?php echo getUrl("Edicion","Edicion","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="edicion_id" value="<?php echo $aniE['edicion_id']?>">
            <label class="col-form-label"><strong>AÑO EDICION</strong></label>
            <input value="<?php echo $aniE['edicion_desc'] ?>" type="text" name="edicion_desc" class="form-control validarEdic">
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