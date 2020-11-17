<?php
  while($aut=pg_fetch_assoc($autor)){
?>

<form action="<?php echo getUrl("Autor","Autor","postDelete"); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="autor_id" value="<?php echo $aut['autor_id']  ?>">
    <div class="modal-body">
      <div class="col-md-12 form-group">
        <label>Nombre</label>
          <input type="text" name="autor_desc" class="form-control validarAutor" value="<?php echo $aut['autor_desc'] ?>" readonly="">
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

 