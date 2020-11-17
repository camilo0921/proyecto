<?php
  while ($aniE=pg_fetch_assoc($edicion)) {
?>
      
<form action="<?php echo getUrl("Edicion","Edicion","postDelete"); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="edicion_id" value="<?php echo $aniE['edicion_id']  ?>">
    <div class="modal-body">
      <div class="col-md-12 form-group">
        <label>AÑO EDICION</label>
          <input type="text" name="edicion_desc" class="form-control validarEdic" value="<?php echo $aniE['edicion_desc'] ?>" readonly="">
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

 