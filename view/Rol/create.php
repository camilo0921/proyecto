<div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
     <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR ROL</h2>
</div>

<form action="<?php echo getUrl("Rol","Rol","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">
     <div>
           <center> <label>ROL</label></center>
    </div><br>
        <div class="form-control">
            <input type="text" class="form-control validarRol" tipo="rol_desc" name="rol_desc" id="rol_desc" placeholder="Nombre del Rol">
            <span class="rol_desc text-danger"></span>
            <div id="rol"></div>
        </div><br>

    <center>
        <input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarRol">
    </center>
    
</form>






    

      