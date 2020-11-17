<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:lavender">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title col-md-10"><strong>LIBRO</strong></h3>
                            <?php if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {  ?>
                                <a href="<?php echo getUrl("Libro","Libro","getCreate"); ?>"><button class="btn 
                                btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal"><i class="fa fa-plus"></i>Agregar Libro</button></a><br>
                            <?php } ?>
                            
                            <?php if ($_SESSION['rol']==3 ) {  ?>
                                <a href="<?php echo getUrl("PrestamoLibroUsuario","PrestamoLibroUsuario","getCreate"); ?>"><button class="btn btn-secondary btn-round ml-auto" data-toggle='modal' data-target="#modalPrestamo"><i class="fa fa-plus"></i>Registrar Prestamo</button></a> 
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
                                    while ($lib=pg_fetch_assoc($libro)) {
                                        if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {
                                            $html_botones="<td><button class=' btn btn-primary  modificarL'data-toggle='modal'data-target='#modalUpdate'data-url='".getUrl("Libro","Libro","getUpdate",false,"ajax")."'data-id='".$lib['libro_id']."'>EDITAR</button></a>

                                                <button class=' btn btn-outline-info descripcionLibro'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("Libro","Libro","getDetalles",false,"ajax")."'data-id='".$lib['libro_id']."'>DETALLES</button></a></td>";

                                        }else{
                                            $html_botones="<td><button class=' btn btn-outline-info descripcionLibro'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("Libro","Libro","getDetalles",false,"ajax")."'data-id='".$lib['libro_id']."'>DETALLES</button></a></td>"; 
                                        }

                                            echo "<tr>
                                                        <td>".$lib['libro_id']."</td>
                                                        <td>".$lib['libro_nombre']."</td>
                                                        <td>".$lib['genero_desc']."</td> 
                                                        <td>".$lib['autor_desc']."</td>
                                                        <td><img src='".$lib['libro_foto']."' width='100' heigth='100'></td>
                                                        ".$html_botones."</td>";
                                                        


                                                if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {        
                                                    if($lib['estado_id']==1){
                                                        echo "<td><a><button class='btn btn-danger estadoLibro' data-estado='".$lib['estado_id']."'  data-id='".$lib['libro_id']."' data-url='".getUrl("Libro","Libro","getEstado",false,"ajax")."'>Inhabilitar</button></a></td>";


                                                    }else if($lib['estado_id']==2){
                                                        echo "<td><a><button class='btn btn-success estadoLibro' data-estado='".$lib['estado_id']."'  data-id='".$lib['libro_id']."' data-url='".getUrl("Libro","Libro","getEstado",false,"ajax")."'>Habilitar</button></a></td>";
                                                    }
                                                }
                                            echo "</tr>";

                                    }

                                ?>   
                                        
                            </tbody>
                        </table>
                        
                    
                    <?php include_once '../view/Libro/modal.php'; ?>
                    </div>
                </div>
                
            </div><!--END CARD-->
        </div><!--END CLASS COL-MD-12-->
   </div> <!--END ClASS ROW-->
</div><!--END PAGE-INNER-->


    

        
            

                       

