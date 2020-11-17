<?php
  while ($edi=pg_fetch_assoc($editorial)){
?>

<form action="<?php echo getUrl("Editorial","Editorial","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="editorial_id" value="<?php echo $edi['editorial_id']?>">
            <label class="col-form-label"><strong>NOMBRE EDITORIAL</strong></label>
            <input value="<?php echo $edi['editorial_desc'] ?>" type="text" name="editorial_desc" class="form-control validarEdi">
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