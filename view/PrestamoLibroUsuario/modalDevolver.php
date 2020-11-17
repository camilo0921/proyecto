<?php
  while ($preL=pg_fetch_assoc($prestamolibro)) {
?>
    
<form action="<?php echo getUrl("PrestamolibroUsuario","PrestamolibroUsuario","postDelete"); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="prestamo_id" value="<?php echo $preL['prestamo_id']  ?>">
  
  
    <div class="form-row">
        <div class="col-md-2">
        <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
      </div>
      <div class="col-sm-4">
        <input value="<?php echo $preL['prestamo_fecha'] ?>" type="date" class="form-control" placeholder="Fecha Prestamo Libro" name="prestamo_fecha" disabled>
      </div>

      <div class="col-md-2">
        <label class="col-form-label"><strong>NOMBRE LIBRO</strong></label>
      </div>
      <div class="col-md-12 form-group">
        <input disabled type="text" value="<?php echo $preL['libro_nombre']; ?>" name="libro_nombre" class="form-control">
      </div><br><br><br>  
    </div>

    <div class="form-row">
      <div class="col-md-2">
        <label class="col-form-label"><strong>NOMBRE USUARIO</strong></label>
      </div>

      <div class="col-sm-4">
        <input disabled type="text" value="<?php echo $preL['usuario_nombre']; ?>" name="usuario_nombre" class="form-control">
      </div><br><br><br>  
    </div>
  
    
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Devolver</button>
    </div>

</form>
 
<?php
  } 
?>
