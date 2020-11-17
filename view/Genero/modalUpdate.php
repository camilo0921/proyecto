<?php
  while ($gen=pg_fetch_assoc($genero)){
?>

<form action="<?php echo getUrl("Genero","Genero","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="genero_id" value="<?php echo $gen['genero_id']?>">
            <label class="col-form-label"><strong>NOMBRE GENERO</strong></label>
            <input value="<?php echo $gen['genero_desc'] ?>" type="text" name="genero_desc" class="form-control validarGene">
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