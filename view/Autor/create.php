<div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
     <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR AUTOR</h2>
</div>

<form action="<?php echo getUrl("Autor","Autor","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">
     <div>
           <center> <label>NOMBRE AUTOR</label></center>
    </div><br>
        <div class="form-control">
            <input type="text" class="form-control validarAutor" tipo="autor_desc" name="autor_desc" id="autor_desc" placeholder="Nombre del Autor">
            <span class="autor_desc text-danger"></span>
            <div id="autor"></div>
        </div><br>

    <center>
        <input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarAutor">
    </center>
    
</form>






    

      