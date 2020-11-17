<?php
 	while ($preL=pg_fetch_assoc($prestamolibro)) {
?>
      
<form action="<?php echo getUrl("PrestamoLibroUsuario","PrestamoLibroUsuario","postDelete"); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="prestamo_id" value="<?php echo $preL['prestamo_id']  ?>">
    <div class="modal-body">	
	<div class="row">
		<div class="col-md-4">
			<label><strong>FECHA PRESTAMO</strong></label>
				<input value="<?php echo $preL['prestamo_fecha'] ?>" type="date" class="form-control" placeholder="Fecha Prestamo Libro" name="prestamo_fecha" disabled>
		</div>
		<div class="col-md-4">
			<label><strong>NOMBRE LIBRO</strong></label>
			<input type="text" readonly class="form-control" name="libro_nombre" value="<?php echo $preL['libro_nombre']?>">
		</div>
		<div class="col-md-4">
			<label><strong>NOMBRE USUARIO</strong></label>
			<input type="text" readonly class="form-control" name="usuario_nombre" value="<?php echo $preL['usuario_nombre']?>">
		</div>
	</div>

	<div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Devolver</button>
    </div>


</form>

<?php
	}
?> 

 