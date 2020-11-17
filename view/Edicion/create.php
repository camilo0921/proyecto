<div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
     <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR EDICION</h2>
</div>

<form action="<?php echo getUrl("Edicion","Edicion","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">
     <div>
           <center> <label>AÑO EDICION</label></center>
    </div><br>
        <div class="form-control">
            <input type="text" class="form-control validarEdic" tipo="edicion_desc" name="edicion_desc" id="edicion_desc" placeholder="Año de la Edicion">
            <span class="edicion_desc text-danger"></span>
            <div id="edicion"></div>
        </div><br>

    <center>
        <input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarEdicion">
    </center>
    
</form>






    

      