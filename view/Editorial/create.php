<div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
     <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR EDITORIAL</h2>
</div>

<form action="<?php echo getUrl("Editorial","Editorial","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">
     <div>
           <center> <label>EDITORIAL</label></center>
    </div><br>
        <div class="form-control">
            <input type="text" class="form-control validarEdit" tipo="editorial_desc" name="editorial_desc" id="editorial_desc" placeholder="Nombre del Editorial">
            <span class="editorial_desc text-danger"></span>
            <div id="editorial"></div>
        </div><br>

    <center>
        <input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarEditorial">
    </center>
    
</form>






    

      