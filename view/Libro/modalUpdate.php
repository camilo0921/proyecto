<?php
  while ($lib=pg_fetch_assoc($libro)){
?>

<form action="<?php echo getUrl("Libro","Libro","postUpdate"); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
          <div class="form group">
            <input type="hidden" name="libro_id" value="<?php echo $lib['libro_id']?>">
            <label class="col-form-label"><strong>NOMBRE LIBRO</strong></label>
            <input value="<?php echo $lib['libro_nombre'] ?>" type="text" name="libro_nombre" class="form-control validarLib">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-form-label"><strong>GENERO</strong></label>
              <select name="genero_id" id="genero_id" class="form-control">
                <option value="">Seleccione...</option>
                  <?php

                      while($gen=pg_fetch_assoc($genero)){
                        if($gen['genero_id']==$lib['genero_id']){
                          echo "<option value='".$gen['genero_id']."' selected>".$gen['genero_desc']."</option>";
                        }else{
                          echo "<option value='".$gen['genero_id']."'>".$gen['genero_desc']."</option>";
                        }
                        
                      }
                  ?>
              </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-form-label"><strong>AÑO EDICION</strong></label>
              <select name="edicion_id" id="edicion_id" class="form-control">
                <option value="">Seleccione...</option>
                  <?php
                      while($aniE=pg_fetch_assoc($edicion)){
                        if($aniE['edicion_id']==$lib['edicion_id']){
                          echo "<option value='".$aniE['edicion_id']."' selected>".$aniE['edicion_desc']."</option>";
                        }else{
                          echo "<option value='".$aniE['edicion_id']."'>".$aniE['edicion_desc']."</option>";
                        }
                      }
                  ?>
              </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-form-label"><strong>EDITORIAL</strong></label>
              <select name="editorial_id" id="editorial_id" class="form-control">
                <option value="">Seleccione...</option>
                  <?php
                      while ($edi=pg_fetch_assoc($editorial)){
                        if($edi['editorial_id']==$lib['editorial_id']){
                          echo "<option value='".$edi['editorial_id']."' selected>".$edi['editorial_desc']."</option>";
                        }else{
                          echo "<option value='".$edi['editorial_id']."'>".$edi['editorial_desc']."</option>";
                        }
                      }
                  ?>
              </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-form-label"><strong>AUTOR</strong></label>
              <select name="autor_id" id="autor_id" class="form-control">
                <option value="">Seleccione...</option>
                  <?php
                      while($aut=pg_fetch_assoc($autor)){
                        if($aut['autor_id']==$lib['autor_id']){
                          echo "<option value='".$aut['autor_id']."' selected>".$aut['autor_desc']."</option>";
                        }else{
                          echo "<option value='".$aut['autor_id']."'>".$aut['autor_desc']."</option>"; 
                        }     
                      }
                  ?>
              </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label class="col-form-label"><strong>IDIOMA</strong></label>
              <select name="idioma_id" id="idioma_id" class="form-control">
                <option value="">Seleccione...</option>
                  <?php
                      while($idi=pg_fetch_assoc($idioma)){
                        if($idi['idioma_id']==$lib['idioma_id']){
                          echo "<option value='".$idi['idioma_id']."' selected>".$idi['idioma_desc']."</option>";
                        }else{
                          echo "<option value='".$idi['autor_id']."'>".$idi['idioma_desc']."</option>";
                        }      
                      }
                  ?>
              </select>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form group">
            <label class="col-form-label"><strong>N° PAGINAS</strong></label>
            <input value="<?php echo $lib['libro_pagina'] ?>" type="text" name="libro_pagina" class="form-control validarPagi">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form group">
            <label class="col-form-label"><strong>CANTIDAD</strong></label>
            <input value="<?php echo $lib['libro_cantidad'] ?>" type="text" name="libro_cantidad" class="form-control validarPagi">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form group">
            <center><label class="col-form-label"><strong>FOTO LIBRO</strong></label>
              <input type="hidden" name="libro_foto" value="<?php echo $lib['libro_foto'] ?>">
              <div id="cambiarFoto">
                <img src="<?php echo $lib['libro_foto'];?>" alt="libro_foto" width="100" heigth="100">
               
                <button type="button" class=" btn btn-primary" id="cambiarF">Cambiar Foto</button>
              </div>
            </center>
          </div>
        </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      <button type="submit" name="Enviar" value="Enviar" class="btn btn-success">Editar</button>
    </div>

</form>
 
<?php
  } 
?>