<?php
  while ($aut=pg_fetch_assoc($autor)){
?>

<form action="<?php echo getUrl("Autor","Autor","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="autor_id" value="<?php echo $aut['autor_id']?>">
            <label class="col-form-label"><strong>NOMBRE AUTOR</strong></label>
            <input value="<?php echo $aut['autor_desc'] ?>" type="text" name="autor_desc" class="form-control validarAutor">
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