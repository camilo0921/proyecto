<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="contenido-modal">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Devolucion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <form action="<?php echo getUrl("DevolucionLibro","DevolucionLibro","postCreate"); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="container">
                <div class="form-row">
                  <div class="col-md-2">
                    <input type="hidden" name="devolucion_id" value="<?php echo $dev['devolucion_id']  ?>">
                    <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
                  </div>

                  <div class="col-sm-4">
                    <input type="date" class="form-control validarFecha" tipo="devolucion_fecha"  name="devolucion_fecha" id="devolucion_fecha" placeholder="Fecha de Devolucion" readonly="">
                  </div><br><br><br>

                  <div class="col-md-2">
                      <label class="col-form-label"><strong>NOMBRE LIBRO</strong></label>
                  </div>
                  <div class="col-sm-4">
                      <select name="libro_id" id="libro_id" class="form-control" readonly="">
                          <option value="0">Seleccione...</option>
                              <?php
                                  while ($lib=pg_fetch_assoc($libro)){
                                      echo "<option value='".$lib['libro_id']."'>".$lib['libro_nombre']."</option>";
                                  }
                              ?>
                      </select>
                  </div><br><br><br>  
                </div>

                <div class="form-row">
                    <div class="col-md-2">
                        <label class="col-form-label"><strong>NOMBRE USUARIO</strong></label>
                    </div>
                    <div class="col-sm-4">
                       <select name="usuario_id" id="usuario_id" class="form-control" readonly="">
                            <option value="0">Seleccione...</option>
                                <?php
                                    while ($usu=pg_fetch_assoc($usuario)){
                                        echo "<option value='".$usu['usuario_id']."'>".$usu['usuario_nombre']."</option>";
                                    }
                                ?>
                        </select>
                    </div><br><br><br>
                   
                </div><br>    
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
              <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Registrar</button>
            </div>
                  
        </form>
      </div>
    </div>
  </div>
</div>

<div  class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
             <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR DEVOLUCION LIBRO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="contenido-modal2">
                </div>
              </div>
        </div>
    </div>
</div>

<div  class="modal fade" id="modalDetalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          
             <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">DETALLES DEVOLUCION LIBRO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="contenido-modall">
                </div>
              </div>
        </div>
    </div>
</div>