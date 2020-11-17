<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:lavender">
                    <div class="d-flex align-items-center">
                        <h3 class="card-title col-md-10"><strong>ROLES</strong></h3>

                            <a href="<?php echo getUrl("Rol","Rol","getCreate"); ?>"><button class="btn 
                            btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal"><i class="fa fa-plus"></i>Agregar Rol</button></a>
                          
                    </div>
                </div><!--END card-Header-->
                <div class="card-body">
                                <!--Table Responsive-->
                    <div id="selectCiu" class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>CODIGO</th>
                                    <th>ROL</th>
                                    
                                    <th>ACCIONES</th>
                                 
                                
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php

                                    while ($roles=pg_fetch_assoc($rol)) {
                                        //if ($_SESSION['rol']==4) {
                                            $html_botones="<td><i class='fa fa-edit fa-2x  modificarRol'data-toggle='modal'data-target='#modalUpdate'data-url='".getUrl("Rol","Rol","getUpdate",false,"ajax")."'data-id='".$roles['rol_id']."'></i></a>

                                           
                                                <i class='fa fa-trash fa-2x eliminarRol'data-toggle='modal'data-target='#modalDelete'data-url='".getUrl("Rol","Rol","getDelete",false,"ajax")."'data-id='".$roles['rol_id']."'></i></a></td>";
                                        /*}else{
                                            $html_botones="";
                                        }*/

                                    echo    "<tr>
                                                <td>".$roles['rol_id']."</td>
                                                <td>".$roles['rol_desc']."</td> 
                                                ".$html_botones."
                                            </tr>";
                                }

                                ?>   
                            </tbody>
                        </table>
                        <?php include_once '../view/Rol/modal.php'; ?>
                    </div>
                </div>
                
            </div><!--END CARD-->
        </div><!--END CLASS COL-MD-12-->
   </div> <!--END ClASS ROW-->
</div><!--END PAGE-INNER-->


