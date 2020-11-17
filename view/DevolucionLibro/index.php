<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:lavender">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title col-md-10"><strong>DEVOLUCION LIBROS</strong></h3>
                            

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
                                    while ($devL=pg_fetch_assoc($devolucionlibro)) {
                                        if ($_SESSION['rol']==1 or $_SESSION['rol']==2) {
                                            $html_botones="<td><button class=' btn btn-outline-info descripcionDevLibro'data-toggle='modal'data-target='#modalDetalle' data-url='".getUrl("DevolucionLibro","DevolucionLibro","getDetalles",false,"ajax")."'data-id='".$devL['devolucion_id']."'>DETALLES</button></a></td>";

                                        }else{
                                            $html_botones="<td><button class=' btn btn-outline-info descripcionDevLibro'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("DevolucionLibro","DevolucionLibro","getDetalles",false,"ajax")."'data-id='".$devL['devolucion_id']."'>DETALLES</button></a></td>";
                                        }

                                            echo "<tr>
                                                        <td>".$devL['devolucion_id']."</td>
                                                        <td>".$devL['devolucion_fecha']."</td>
                                                        <td>".$devL['libro_nombre']."</td> 
                                                        <td>".$devL['usuario_nombre']."</td>
                                                        ".$html_botones."</td>";

                                                /*echo "<tr>";
                                                        echo "<td>".$devL['prestamo_id']."</td>";
                                                        echo "<td>".$devL['prestamo_fecha']."</td>";
                                                        echo "<td>".$devL['libro_nombre']."</td>";
                                                        echo "<td>".$devL['usuario_nombre']."</td>";

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
                        
                    
                    <?php include_once '../view/DevolucionLibro/modal.php'; ?>
                    </div>
                </div>
                
            </div><!--END CARD-->
        </div><!--END CLASS COL-MD-12-->
   </div> <!--END ClASS ROW-->
</div><!--END PAGE-INNER-->


    

        
            

                       

