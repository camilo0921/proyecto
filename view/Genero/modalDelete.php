<?php
  while ($gen=pg_fetch_assoc($genero)) {
?>
     
<form action="<?php echo getUrl("Genero","Genero","postDelete"); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="genero_id" value="<?php echo $gen['genero_id']  ?>">
    <div class="modal-body">
      <div class="col-md-12 form-group">
        <label>Nombre</label>
          <input type="text" name="genero_desc" class="form-control validarGene" value="<?php echo $gen['genero_desc'] ?>" readonly="">
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

 