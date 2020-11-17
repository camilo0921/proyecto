<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:lavender">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title col-md-10"><strong>IDIOMAS</strong></h3>
                            <?php if ($_SESSION['rol']==1) {  ?>
                                <a href="<?php echo getUrl("Idioma","Idioma","getCreate"); ?>"><button class="btn 
                                btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal"><i class="fa fa-plus"></i>Agregar Idioma</button></a>
                            <?php } ?>
                    </div>
                </div><!--END card-Header-->
                <div class="card-body">
                                <!--Table Responsive-->
                    <div id="selectCiu" class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>CODIGO</th>
                                    <th>IDIOMA</th>
                                    <?php if ($_SESSION['rol']==1) {  ?>
                                        <th>ACCIONES</th>
                                    <?php } ?>
                                 
                                
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php

                                    while ($idi=pg_fetch_assoc($idioma)) {
                                        if ($_SESSION['rol']==1) {
                                            $html_botones="<td><i class='fa fa-edit fa-2x  modificarIdi'data-toggle='modal'data-target='#modalUpdate'data-url='".getUrl("Idioma","Idioma","getUpdate",false,"ajax")."'data-id='".$idi['idioma_id']."'></i></a>

                                           
                                                <i class='fa fa-trash fa-2x eliminarIdi'data-toggle='modal'data-target='#modalDelete'data-url='".getUrl("Idioma","Idioma","getDelete",false,"ajax")."'data-id='".$idi['idioma_id']."'></i></a></td>";
                                        }else{
                                            $html_botones="";
                                        }

                                    echo    "<tr>
                                                <td>".$idi['idioma_id']."</td>
                                                <td>".$idi['idioma_desc']."</td> 
                                                ".$html_botones."
                                            </tr>";
                                }

                                ?>   
                            </tbody>
                        </table>
                        <?php include_once '../view/Idioma/modal.php'; ?>
                    </div>
                </div>
                
            </div><!--END CARD-->
        </div><!--END CLASS COL-MD-12-->
   </div> <!--END ClASS ROW-->
</div><!--END PAGE-INNER-->


