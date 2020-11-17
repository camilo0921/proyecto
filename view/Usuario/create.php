<div class="jumbotron" style="height: 60px;background-color:#E6E6FA;">
     <h2 style=" color:black; font-size: 50px; position: absolute; top: 90px; left: 250px;">REGISTRAR USUARIO</h2>
</div>
<form action="<?php echo getUrl("Usuario","Usuario","postCreate"); ?>" method="post" enctype="multipart/form-data" onsubmit="">
	
	<div class="container">
		<div class="form-row">
			<div class="col-md-1">
			    <label class="col-form-label"><strong>NOMBRE</strong></label>
			</div>
			<div class="col-sm-5">
		        <input type="text" class="form-control validarUsu " tipo="tipoUsu"  name="usuario_nombre" id="usuario_nombre" >
                <span class="usuario_nombre text-danger"></span>
			</div>

			<div class="col-md-1">
		        <label  class="col-form-label"><strong>APELLIDOS</strong></label>
		    </div>
		    <div class="col-sm-5">
		        <input type="text" class="form-control validarUsu" tipo="tipoUsu" name="usuario_apellidos" id="usuario_apellidos" >
                <span class="usuario_apellidos text-danger"></span>
			</div><br><br><br>
		</div>

		<div class="form-row">
			<div class="col-md-2">	
				<label class="col-form-label"><strong>NUMERO IDENTIFICACION</strong></label>
			</div>
			<div class="col-md-4">
				<input type="text" class="form-control validarId" name="usuario_identificacion" id="usuario_identificacion" >
                <span class="usuario_identificacion text-danger"></span>
            </div>
			<div class="col-sm-1">
				<label class="col-form-label"><strong>TELEFONO</strong></label>
			</div>	
		    <div class="col-sm-5">
		        <input type="text" class="form-control validarTel" name="usuario_telefono" id="usuario_telefono" >
                <span class="usuario_telefono text-danger"></span>
			</div><br><br><br>
		</div>

		<div class="form-row">
			<div class="col-md-2">
			    <label class="col-form-label"><strong>FECHA DE NACIMIENTO</strong></label>
			</div>
			<div class="col-sm-4">
		        <input  type="date" class="form-control" name="usuario_fecha_nac" id="usuario_fecha_nac">
			</div>
			<div class="col-md-1">
		        <label class="col-form-label"><strong>CORREO</strong></label>
		    </div>
		    <div class="col-sm-5">
		        <input type="text" class="form-control validarCorreo" name="usuario_correo" id="usuario_correo" >
                <span class="usuario_correo text-danger"></span>
			</div><br><br><br>
		</div>

		<div class="form-row">
			<div class="col-md-2">
		        <label  class="col-form-label"><strong>CONTRASEÑA</strong></label>
		    </div>
		    <div class="col-sm-4">
		        <input type="password" class="form-control validarContraseña" tipo="tipoContra"  name="usuario_contrasena" id="usuario_contrasena" >
                <span class="usuario_contrasena text-danger"></span>
			</div>

		<?php if ($_SESSION['rol']==1) {  ?>
			<div class="col-md-1">
		        <label class="col-form-label"><strong>ROL</strong></label>
		    </div>
            <div class="col-sm-5">
            	
					<select class="form-control"  name="rol_id" id="rol_id">
					
	                   <option value="0">Seleccione</option>
	                    <?php

	                        while ($roles=pg_fetch_assoc($rol)){
	                       		//if($_SESSION['rol']==2){  
	                       			
		                       		//echo "<option value='".$roles['rol_id']==3;"'>".$roles['rol_desc']=='Usuario'."</option>";
		                        //}else{
	                  				echo "<option value='".$roles['rol_id']."'>".$roles['rol_desc']."</option>";
	               				//}
	               				
	               				
	               			} 
	                    ?>
	                
	                </select>
           	
            </div><br><br><br>
		 <?php } ?> 
			
		      
                
		    
		</div>

		<div class="form-row">
			
		</div><br>
	</div><br>
		<center id="botonEnviar"><button type="submit" class="btn btn-outline-primary" id="registrarUsuario">REGISTRAR</button></center><br>

</form>


    
