<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:lavender">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title col-md-10"><strong>PRESTAMOS REVISTA</strong></h3>
                            <?php if ($_SESSION['rol']==3) {  ?>
                                <a href="<?php echo getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","getCreate"); ?>"><button class="btn 
                                btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal"><i class="fa fa-plus"></i>Agregar Prestamo Revista</button></a>
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
                                    <th>FECHA</th>
                                    <th>LIBRO</th>
                                    <th>USUARIO</th>
                                    <th>ACCIONES</th>
                                    

                                </tr>
                            </thead>
                           
                            <tbody>
                 
                                <?php
                                    while ($preR=pg_fetch_assoc($prestamorevista)) {
                                        if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {
                                            $html_botones="<td><button class=' btn btn-outline-info descripcionPresRevi'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","getDetalles",false,"ajax")."'data-id='".$preR['prestamor_id']."'>DETALLES</button></a></td>";

                                        }else{
                                            $html_botones="<td><button class=' btn btn-outline-info descripcionPresRevi'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","getDetalles",false,"ajax")."'data-id='".$preR['prestamor_id']."'>DETALLES</button></a>

                                            <button class=' btn btn-outline-danger devolverRevista'data-toggle='modal'data-target='#modalDevolverR' data-url='".getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","getDelete",false,"ajax")."' data-id='".$preR['prestamor_id']."', data-id2='".$preR['revista_id']."'>DEVOLVER</button></a></td>";


                                        }

                                            echo "<tr>
                                                        <td>".$preR['prestamor_id']."</td>
                                                        <td>".$preR['prestamo_fecha']."</td>
                                                        <td>".$preR['revista_nombre']."</td> 
                                                        <td>".$preR['usuario_nombre']."</td>
                                                        ".$html_botones."</td>";

                                                /*echo "<tr>";
                                                        echo "<td>".$preR['prestamor_id']."</td>";
                                                        echo "<td>".$preR['prestamo_fecha']."</td>";
                                                        echo "<td>".$preR['revista_nombre']."</td>";
                                                        echo "<td>".$preR['usuario_nombre']."</td>";

                                                        echo "<td>".$html_botones."</td>";*/ 


                                                        /*if($lib['estado_id']==1){
                                                        echo "<a><button class='btn btn-danger estado' data-estado='".$lib['estado_id']."'  data-id='".$lib['libro_id']."' data-url='".getUrl("Libro","Libro","getDelete",false,"ajax")."'>Habilitar</button></a>";

                                                        }else if($lib['estado_id']==2){
                                                            echo "<td><a><button class='btn btn-success estado' data-estado='".$lib['estado_id']."'  data-id='".$lib['libro_id']."' data-url='".getUrl("Libro","Libro","getDelete",false,"ajax")."'>Inhabilitar</button></a></td>";
                                                        }*/

                                                echo "</tr>";

                                    }

                                ?>   
                                        
                            </tbody>
                        </table>
                        
                    
                    <?php include_once '../view/PrestamoLibroUsuario/modal.php'; ?>
                    </div>
                </div>
                
            </div><!--END CARD-->
        </div><!--END CLASS COL-MD-12-->
   </div> <!--END ClASS ROW-->
</div><!--END PAGE-INNER-->


    

        
            

                       

