<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:lavender">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title col-md-10"><strong>REVISTA</strong></h3>
                            <?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {  ?>
                                <a href="<?php echo getUrl("Revista","Revista","getCreate"); ?>"><button class="btn 
                                btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal"><i class="fa fa-plus"></i>Agregar Revista</button></a>
                            <?php } ?>

                            <?php if ($_SESSION['rol']==3 ) {  ?>
                                <a href="<?php echo getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","getCreate"); ?>">
                                <button class="btn 
                                btn-secondary btn-round ml-auto" data-toggle='modal' data-target="#modalPrestamoRe"><i class="fa fa-plus"></i>Registrar Prestamo</button></a> 
                            <?php } ?>
                    </div>
                </div><!--END card-Header-->
                <div class="card-body">
                                <!--Table Responsive-->
                    <div id="selectCiu" class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>GENERO</th>
                                    <th>AUTOR</th>
                                    <th>FOTO</th>
                                    <th>ACCIONES</th>
                                    <?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {  ?>
                                        <th>ESTADO</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                           
                            <tbody>
                 
                                <?php
                                    while ($rev=pg_fetch_assoc($revista)) {
                                        if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {
                                            $html_botones="<td> <button class=' btn btn-primary  modificarRev'data-toggle='modal'data-target='#modalUpdate'data-url='".getUrl("Revista","Revista","getUpdate",false,"ajax")."'data-id='".$rev['revista_id']."'>EDITAR</button></a>

                                            <button class=' btn btn-outline-info descripcionRevi'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("Revista","Revista","getDetalles",false,"ajax")."'data-id='".$rev['revista_id']."'>DETALLES</button></a></td>";

                                        }else{
                                            $html_botones="<td><button class=' btn btn-outline-info descripcionRevi'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("Revista","Revista","getDetalles",false,"ajax")."'data-id='".$rev['revista_id']."'>DETALLES</button></a></td>";
                                        }

                                                echo "<tr>
                                                        <td>".$rev['revista_id']."</td>
                                                        <td>".$rev['revista_nombre']."</td>
                                                        <td>".$rev['genero_desc']."</td> 
                                                        <td>".$rev['autor_desc']."</td>
                                                        <td><img src='".$rev['revista_foto']."' width='100' heigth='100'></td>
                                                         ".$html_botones."</td>";
                                                         

                                                    if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {        
                                                        if($rev['estado_id']==1){
                                                            echo "<td><a><button class='btn btn-danger estadoRevista' data-estado='".$rev['estado_id']."'  data-id='".$rev['revista_id']."' data-url='".getUrl("Revista","Revista","getEstado",false,"ajax")."'>Inhabilitar</button></a></td>";


                                                        }else if($rev['estado_id']==2){
                                                             echo "<td><a><button class='btn btn-success estadoRevista' data-estado='".$rev['estado_id']."'  data-id='".$rev['revista_id']."' data-url='".getUrl("Revista","Revista","getEstado",false,"ajax")."'>Habilitar</button></a></td>";
                                                        }
                                                    }

                                                echo "</tr>";
                                    }

                                ?>   
                                        
                            </tbody>
                        </table>
                        
                    
                    <?php include_once '../view/Revista/modal.php'; ?>
                    </div>
                </div>
                
            </div><!--END CARD-->
        </div><!--END CLASS COL-MD-12-->
   </div> <!--END ClASS ROW-->
</div><!--END PAGE-INNER-->


    

        
            

                       

