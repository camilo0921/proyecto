<?php

  while ($lib=pg_fetch_assoc($libro)){
  
?>

  <div class="modal-body ">
    <div class="container">
      <div class="form-row">
        <div class="col-md-2">
          <label class="col-form-label"><strong>NOMBRE DEl LIBRO</strong></label>
        </div>
        <div class="col-sm-4">
          <input value="<?php echo $lib['libro_nombre'] ?>" type="text" class="form-control" placeholder="Nombre Libro" name="libro_nombre" disabled>
        </div>

        <div class="col-md-2">
          <label class="col-form-label"><strong>NOMBRE GENERO</strong></label>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="genero_id" disabled>
            <option>Seleccione...</option>
            <?php
                        
              while ($gen=pg_fetch_assoc($genero)){
                if($lib['genero_id']==$gen['genero_id']){
                  $selected="selected";
                }else{
                  $selected="";
                }
                  echo "<option value='".$gen['genero_id']."'$selected>".$gen['genero_desc']."</option>";
              }

            ?>

          </select>
        </div><br><br><br>  
      </div>

      <div class="form-row">
        <div class="col-md-2">
          <label class="col-form-label"><strong>AÑO EDICION</strong></label>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="edicion_id" disabled>
            <option>Seleccione...</option>
            <?php

              while($aniE=pg_fetch_assoc($edicion)){
                if($lib['edicion_id']==$aniE['edicion_id']){
                  $selected="selected";
                }else{
                  $selected="";
                }
                  echo "<option value='".$aniE['edicion_id']."' $selected>".$aniE['edicion_desc']."</option>";
                }

            ?>
                    
          </select>
        </div>  
      
        <div class="col-md-2">
          <label class="col-form-label"><strong>NOMBRE EDITORIAL</strong></label>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="editorial_id" disabled>
            <option>Seleccione...</option>
            <?php
                        
              while ($edi=pg_fetch_assoc($editorial)){
                if($lib['editorial_id']==$edi['editorial_id']){
                  $selected="selected";
                }else{
                  $selected="";
                }
                  echo "<option value='".$edi['editorial_id']."' $selected>".$edi['editorial_desc']."</option>";
                }

            ?>

          </select>
        </div><br><br><br>  
      </div>

      <div class="form-row">
        <div class="col-md-2">
          <label class="col-form-label"><strong>NOMBRE AUTOR</strong></label>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="autor_id" disabled>
            <option>Seleccione...</option>
            <?php
                        
              while($aut=pg_fetch_assoc($autor)){
                if($lib['autor_id']==$aut['autor_id']){
                  $selected="selected";
                }else{
                  $selected="";
                }
                  echo "<option value='".$aut['autor_id']."'$selected>".$aut['autor_desc']."</option>";
                }

            ?>

          </select>
        </div>  
      
        <div class="col-md-2">
          <label class="col-form-label"><strong>IDIOMA</strong></label>
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="idioma_id" disabled>
            <option>Seleccione...</option>
            <?php
                        
              while($idi=pg_fetch_assoc($idioma)){
                if($lib['idioma_id']==$idi['idioma_id']){
                  $selected="selected";
                }else{
                  $selected="";
                }
                  echo "<option value='".$idi['idioma_id']."'$selected>".$idi['idioma_desc']."</option>";
                }

            ?>

          </select>
        </div><br><br><br>  
      </div> 

      <div class="form-row">
        <div class="col-md-2">
          <label class="col-form-label"><strong>NUMERO DE PAGINAS</strong></label>
        </div>
        <div class="col-sm-4">
          <input value="<?php echo $lib['libro_pagina'] ?>" type="number" class="form-control" placeholder="Numero de paginas" name="libro_pagina" disabled>
        </div>

        <div class="col-md-2">
          <label class="col-form-label"><strong>CANTIDAD</strong></label>
        </div>
        <div class="col-sm-4">
          <input value="<?php echo $lib['libro_cantidad'] ?>" type="number" class="form-control" placeholder="Cantidad de Libros" name="libro_cantidad" disabled>
        </div><br><br><br>   
      </div>

      <center id="libro_foto">
        <img src="<?php echo $lib['libro_foto'];?>" name="libro_foto" width="220" heidth="220" disabled>
      </center> <br> 

     
    
      <center>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </center>
    </div>
  </div>
</form>

                  
<?php
  } 
?>