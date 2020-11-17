    <div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
        <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR LIBRO</h2>
    </div>
<form action="<?php echo getUrl("Libro","Libro","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">

<div class="container">
    <div class="form-row">
        <div class="col-md-1">
            <label class="col-form-label"><strong>NOMBRE DEL LIBRO</strong></label>
        </div>
        <div class="col-sm-5">
            <input type="text"  class="form-control validarLib" tipo="libro_nombre"  name="libro_nombre" id="libro_nombre" placeholder="Nombre del Libro" >
            <span class="Libro_nombre text-danger"></span>
            <div id="libro"></div>
        </div>
                
        <div class="col-md-2">
            <label class="col-form-label"><strong>NOMBRE GENERO</strong></label>
        </div>
        <div class="col-sm-4">
            <select name="genero_id" id="genero_id" class="form-control">
                <option value="0">Seleccione...</option>
                    <?php
                        while ($gen=pg_fetch_assoc($genero)){
                            echo "<option value='".$gen['genero_id']."'>".$gen['genero_desc']."</option>";
                        }
                    ?>
            </select>
        </div><br><br><br>  
                
    </div>
    <div class="form-row">
        <div class="col-md-1">
            <label class="col-form-label"><strong>AÑO EDICION</strong></label>
        </div>
        <div class="col-sm-5">
            <select name="edicion_id" id="edicion_id" class="form-control">
                <option value="0">Seleccione...</option>
                    <?php
                        while ($aniE=pg_fetch_assoc($edicion)){
                            echo "<option value='".$aniE['edicion_id']."'>".$aniE['edicion_desc']."</option>";
                        }
                    ?>
            </select>
        </div>

        <div class="col-md-2">
            <label class="col-form-label"><strong>NOMBRE EDITORIAL</strong></label>
        </div>
            <div class="col-sm-4">
                <select name="editorial_id" id="editorial_id" class="form-control">
                    <option value="0">Seleccione...</option>
                    <?php
                        while ($edi=pg_fetch_assoc($editorial)){
                            echo "<option value='".$edi['editorial_id']."'>".$edi['editorial_desc']."</option>";
                        }
                    ?>
            </select>
        </div>  
                
    </div><br>

    <div class="form-row">

        <div class="col-md-1">
            <label class="col-form-label"><strong>NOMBRE AUTOR</strong></label>
        </div>
        <div class="col-sm-5">
            <select name="autor_id" id="autor_id" class="form-control">
                <option value="0">Seleccione...</option>
                <?php
                        
                    while($aut=pg_fetch_assoc($autor)){
                        echo "<option value='".$aut['autor_id']."'>".$aut['autor_desc']."</option>";
                    }
                ?>

            </select>
        </div>  
        <div class="col-md-2">
                <label class="col-form-label"><strong>IDIOMA</strong></label>
        </div>
        <div class="col-sm-4">
            <select name="idioma_id" id="idioma_id" class="form-control">
                <option value="0">Seleccione...</option>
                <?php
                        
                    while($idi=pg_fetch_assoc($idioma)){
                        echo "<option value='".$idi['idioma_id']."'>".$idi['idioma_desc']."</option>";
                    }
                ?>

            </select>
        </div>  
                
    </div><br>

        <div class="form-row">
            <div class="col-md-1">
                <label class="col-form-label"><strong>NUMERO DE PAGINAS</strong></label>
            </div>
            <div class="col-sm-5">
                <input type="text"  class="form-control validarPagi" tipo="libro_pagina"  name="libro_pagina" id="libro_pagina" placeholder="Numero de paginas" >
            </div>

        </div><br>

        <div class="form-row">
            <div class="col-md-1">
                <label class="col-form-label"><strong>CANTIDAD</strong></label>
            </div>
            <div class="col-sm-5">
                <input type="text"  class="form-control validarPagi" tipo="libro_cantidad"  name="libro_cantidad" id="libro_cantidad" placeholder="Cantidad de Libros" >
            </div>
        </div><br> 

        <div class="form-row">
            <div class="col-md-1">
                <label class="col-form-label"><strong>FOTO</strong></label>
            </div>
            <div class="col-sm-5">
                <input type="file" class="form-control validarFoto" placeholder="Ingrese la foto del libro" name="libro_foto" id="libro_foto">
            </div>
        </div><br>      
       

</div><br>
       <center><input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarLibro"></center>

</form>







    

      