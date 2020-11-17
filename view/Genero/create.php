<div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
     <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR GENERO</h2>
</div>

<form action="<?php echo getUrl("Genero","Genero","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">
     <div>
           <center> <label>GENERO</label></center>
    </div><br>
        <div class="form-control">
            <input type="text" class="form-control validarGene" tipo="genero_desc" name="genero_desc" id="genero_desc" placeholder="Nombre del Genero">
            <span class="genero_desc text-danger"></span>
            <div id="genero"></div>
        </div><br>

    <center>
        <input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarGenero">
    </center>
    
</form>






    

      