    <div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
        <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR DEVOLUCION LIBRO</h2>
    </div>
<form action="<?php echo getUrl("DevolucionLibro","DevolucionLibro","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">

<div class="container">
    <div class="form-row">
        <div class="col-md-2">
            <label class="col-form-label"><strong>FECHA PRESTAMO</strong></label>
        </div>
        <div class="col-sm-4">
            <input type="date" class="form-control validarFecha" tipo="devolucion_fecha"  name="devolucion_fecha" id="devolucion_fecha" placeholder="Fecha de Devolucion" >
        </div><br><br><br>

        <div class="col-md-2">
            <label class="col-form-label"><strong>NOMBRE LIBRO</strong></label>
        </div>
        <div class="col-sm-4">
            <select name="libro_id" id="libro_id" class="form-control">
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
           <select name="usuario_id" id="usuario_id" class="form-control">
                <option value="0">Seleccione...</option>
                    <?php
                        while ($usu=pg_fetch_assoc($usuario)){
                            echo "<option value='".$usu['usuario_id']."'>".$usu['usuario_nombre']."</option>";
                        }
                    ?>
            </select>
        </div><br><br><br>
       
    </div><br>    
       

    </div><br>
       <center><input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarDevolucionLibro"></center>

</form>







    

      