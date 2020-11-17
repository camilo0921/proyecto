<div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
     <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR IDIOMA</h2>
</div>

<form action="<?php echo getUrl("Idioma","Idioma","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">
     <div>
           <center> <label>IDIOMA</label></center>
    </div><br>
        <div class="form-control">
            <input type="text" class="form-control validarIdi" tipo="idioma_desc" name="idioma_desc" id="idioma_desc" placeholder="Nombre del Idioma">
            <span class="idioma_desc text-danger"></span>
            <div id="idioma"></div>
        </div><br>

    <center>
        <input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarIdioma">
    </center>
    
</form>






    

      