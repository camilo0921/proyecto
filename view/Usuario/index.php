<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:lavender">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title col-md-10"><strong>USUARIO</strong></h3>

                            <a href="<?php echo getUrl("Usuario","Usuario","getCreate"); ?>"><button class="btn 
                            btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal"><i class="fa fa-plus"></i>Agregar Usuario</button></a>
                          
                    </div>
                </div><!--END card-Header-->
                <div class="card-body">
                                <!--Table Responsive-->
                    <div id="selectCiu" class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                 <tr>
                                    <th>ID</th>
                                    <th>NOMBRES</th>
                                    <th>APELLIDOS</th>
                                    <th>NUMERO DE IDENTIFICACION</th>
                                    <th>ROL</th>
                                    <th>ACCIONES</th>
                                  </tr>
                            </thead>

                            <tbody>
         
                                <?php
                                     while ($usu=pg_fetch_assoc($usuario)) {
                                        echo "<tr>";
                                                echo "<td>".$usu['usuario_id']."</td>";
                                                echo "<td>".$usu['usuario_nombre']."</td>";
                                                echo "<td>".$usu['usuario_apellidos']."</td>";
                                                echo "<td>".$usu['usuario_identificacion']."</td>";
                                                echo "<td>".$usu['rol_desc']."</td>";

                                        echo "<td>

                                                <button class=' btn btn-primary modificarUsu' data-toggle='modal'data-target='#modalUpdate'data-url='".getUrl("Usuario","Usuario","getUpdate",false,"ajax")."'data-id='".$usu['usuario_id']."'>EDITAR</button></a>

                                                <button class=' btn btn-outline-success descripcionUsu'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("Usuario","Usuario","getDetalles",false,"ajax")."'data-id='".$usu['usuario_id']."'>DETALLES</button></a></td>";

                                        echo "</td>";

                                          /*echo "<td>";
                                         echo "<div class='form-button-action'>";
                                              if($usu['estado_id']==1){
                                            echo "<button class='btn btn btn-danger estado'
                                            data-estado='".$usu['estado_id']."' 
                                            data-id='".$usu['usuario_id']."'
                                            data-url='".getUrl('Usuario','Usuario','getDelete',false,'ajax')."'>INHABILITAR</button>";

                                          }else if($usu['estado_id']==2){
                                            echo "<button class='btn btn-link btn-danger estado'
                                             data-estado='".$usu['estado_id']."' 
                                            data-id='".$usu['usuario_id']."'
                                            data-url='".getUrl('Usuario','Usuario','getDelete',false,'ajax')."'>HABILITAR</button>";
                                          }
                                        echo "</td>";*/
                                   
                                            echo "</div>";
                                       echo "</tr>";
                                
                                }
                              ?>
                      </tbody>
                      </table>
                        
                    
                    <?php include_once '../view/Usuario/modal.php'; ?>
                    </div>
                </div>
                
            </div><!--END CARD-->
        </div><!--END CLASS COL-MD-12-->
   </div> <!--END ClASS ROW-->
</div><!--END PAGE-INNER-->
