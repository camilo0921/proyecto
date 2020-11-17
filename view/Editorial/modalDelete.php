<?php
  while ($edi=pg_fetch_assoc($editorial)){
?>
     
<form action="<?php echo getUrl("Editorial","Editorial","postDelete"); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="editorial_id" value="<?php echo $edi['editorial_id']  ?>">
    <div class="modal-body">
      <div class="col-md-12 form-group">
        <label>Nombre</label>
          <input type="text" name="editorial_desc" class="form-control validarEdi" value="<?php echo $edi['editorial_desc'] ?>" readonly="">
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

 