    <div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
        <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR REVISTA</h2>
    </div>
<form action="<?php echo getUrl("Revista","Revista","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">

    <div class="container">
        <div class="form-row">
            <div class="col-md-1">
                <label class="col-form-label"><strong>NOMBRE DE LA REVISTA</strong></label>
            </div>
            <div class="col-sm-5">
                <input type="text"  class="form-control validarRev" tipo="revista_nombre"  name="revista_nombre" id="revista_nombre" placeholder="Nombre de la Revista" >
                <span class="revista_nombre text-danger"></span>
                <div id="revista"></div>
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
                    <input type="number"  class="form-control validarPagi" tipo="revista_pagina"  name="revista_pagina" id="revista_pagina" placeholder="Numero de paginas" >
                </div>
                 <div class="col-md-1">
                    <label class="col-form-label"><strong>CANTIDAD</strong></label>
                </div>
                <div class="col-sm-5">
                    <input type="number"  class="form-control validarPagi" tipo="revista_cantidad"  name="revista_cantidad" id="revista_cantidad" placeholder="Cantidad de Revistas" >
                </div>
                
            </div><br>

            <div class="form-row">
                <div class="col-md-1">
                    <label class="col-form-label"><strong>FOTO</strong></label>
                </div>
                <div class="col-sm-5">
                    <input type="file" class="form-control validarFoto" placeholder="Ingrese la foto de la revista" name="revista_foto" id="revista_foto">
                </div>
            </div><br>    
    </div><br>

       <center><input type="submit" value="REGISTRAR" name="Enviar" class="btn btn-outline-primary" id="registrarRevista"></center>

</form>







    

      