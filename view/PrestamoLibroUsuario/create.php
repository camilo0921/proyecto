    <div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
        <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR PRESTAMO LIBRO</h2>
    </div>
<form action="<?php echo getUrl("PrestamoLibro","PrestamoLibro","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">

    <div class="container">
        <div class="form-row">
            <div class="col-md-2">
                <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
            </div>
            <div class="col-sm-4">
                <input type="date" class="form-control validarFecha" tipo="prestamo_fecha"  name="prestamo_fecha" id="prestamo_fecha" placeholder="Fecha de Prestamo" >
            </div><br><br><br>

            <div class="col-md-2">
                <label class="col-form-label"><strong>NOMBRE LIBRO</strong></label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name="libro_id">
                    <option>Seleccione...</option>
                    <?php
                          
                    while ($lib=pg_fetch_assoc($libro)){
                      if($preL['libro_id']==$lib['libro_id']){
                        $selected="selected";
                      }else{
                        $selected="";
                      }
                        echo "<option value='".$lib['libro_id']."'$selected>".$lib['libro_nombre']."</option>";
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
                <input type="text" name="nombre" class="form-control" value="<?php echo $_SESSION['nombre']?>" disabled>
                <input type="hidden" name="usuario_id" class="form-control" value="<?php echo $_SESSION['id']?>">
               
            </div><br><br><br>
           
        </div><br>    
    </div><br>
       <center><input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarPrestamoLibro"></center>

</form>







    

      