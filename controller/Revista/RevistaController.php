<?php
	
	include_once '../model/Revista/RevistaModel.php';
	
	class RevistaController{
		
		function getCreate(){
			$objeto=new RevistaModel();

			$sql="SELECT * FROM genero";
			$genero=$objeto->consult($sql);

            $sql1="SELECT * FROM editorial";
			$editorial=$objeto->consult($sql1);

            $sql2="SELECT * FROM autor";
			$autor=$objeto->consult($sql2);

            $sql3="SELECT * FROM idioma";
			$idioma=$objeto->consult($sql3);

            $sql4="SELECT * FROM edicion";
			$edicion=$objeto->consult($sql4);

			include_once '../view/Revista/create.php';
		}
		
		function postCreate(){
            
            $objeto=new RevistaModel();
           
            $revista_nombre=$_POST['revista_nombre'];
            $genero_id=$_POST['genero_id'];
            $edicion_id=$_POST['edicion_id'];
            $editorial_id=$_POST['editorial_id'];
            $autor_id=$_POST['autor_id'];
            $idioma_id=$_POST['idioma_id'];
            $revista_pagina=$_POST['revista_pagina'];
            $revista_cantidad=$_POST['revista_cantidad'];
            $estado_id=1;

			$imagen=$_FILES['revista_foto']['name'];
			$ruta="../web/assets/fotosRev/$imagen";

            move_uploaded_file($_FILES['revista_foto']['tmp_name'],$ruta);


            $revista_id=$objeto->autoincrement("revista","revista_id");

             

            $sql="INSERT INTO revista VALUES($revista_id,'".$revista_nombre."','".$genero_id."','".$edicion_id."','".$editorial_id."','".$autor_id."','".$idioma_id."','".$revista_pagina."','".$revista_cantidad."','".$ruta."',$estado_id)";

            $ejecucion=$objeto->insert($sql);

            if ($ejecucion){
                redirect(getUrl("Revista","Revista","index"));
            }else{
                redirect(getUrl("Revista","Revista","getCreate"));
            }
        }

		public function index(){
            $objeto=new RevistaModel();

            if ($_SESSION['rol']==1 or $_SESSION['rol']==2){

            $sql="SELECT r.revista_id, r.revista_nombre, r.genero_id, g.genero_id, g.genero_desc, r.edicion_id, e.edicion_id, e.edicion_desc,  r.editorial_id, t.editorial_id, t.editorial_desc,  r.autor_id, a.autor_id, a.autor_desc,  r.idioma_id, i.idioma_id, i.idioma_desc, r.revista_pagina, r.revista_cantidad, r.revista_foto, r.estado_id FROM genero g, edicion e, editorial t, autor a, idioma i, revista r WHERE r.genero_id=g.genero_id and r.edicion_id=e.edicion_id and r.editorial_id=t.editorial_id and r.autor_id=a.autor_id and r.idioma_id=i.idioma_id";
            }else{
                $sql="SELECT r.revista_id, r.revista_nombre, r.genero_id, g.genero_id, g.genero_desc, r.edicion_id, e.edicion_id, e.edicion_desc,  r.editorial_id, t.editorial_id, t.editorial_desc,  r.autor_id, a.autor_id, a.autor_desc,  r.idioma_id, i.idioma_id, i.idioma_desc, r.revista_pagina, r.revista_cantidad, r.revista_foto, r.estado_id FROM genero g, edicion e, editorial t, autor a, idioma i, revista r WHERE r.genero_id=g.genero_id and r.edicion_id=e.edicion_id and r.editorial_id=t.editorial_id and r.autor_id=a.autor_id and r.idioma_id=i.idioma_id and r.estado_id=1";
            }

            $revista=$objeto->consult($sql);

      		include_once '../view/Revista/index.php';
        }

        public function getDetalles(){
            $objeto=new RevistaModel();

            $revista_id=$_POST['revista_id'];

            $sql5="SELECT * FROM revista WHERE revista_id=$revista_id";
            $revista=$objeto->consult($sql5);

            $sql="SELECT * FROM genero";
            $genero=$objeto->consult($sql);

            $sql1="SELECT * FROM edicion";
            $edicion=$objeto->consult($sql1);

            $sql2="SELECT * FROM editorial";
            $editorial=$objeto->consult($sql2);

            $sql3="SELECT * FROM autor";
            $autor=$objeto->consult($sql3);

            $sql4="SELECT * FROM idioma";
            $idioma=$objeto->consult($sql4);

            include_once '../view/Revista/modalDescripcion.php';
            
        }

		function getUpdate(){

	        $objeto=new RevistaModel();
	        $revista_id=$_POST['revista_id'];
	    
	        $sql="SELECT * FROM revista WHERE revista_id=$revista_id";
			$revista=$objeto->consult($sql);

	        $sql2="SELECT * FROM genero";
			$genero=$objeto->consult($sql2);

			$sql3="SELECT * FROM edicion";
			$edicion=$objeto->consult($sql3);

			$sql4="SELECT * FROM editorial";
			$editorial=$objeto->consult($sql4);

			$sql5="SELECT * FROM autor";
			$autor=$objeto->consult($sql5);

			$sql6="SELECT * FROM idioma";
			$idioma=$objeto->consult($sql6);

	        include_once '../view/Revista/modalUpdate.php';
	     
		}

        function postUpdate(){
            $objeto=new RevistaModel();
            
	        $revista_id=$_POST['revista_id'];
	        $revista_nombre=$_POST['revista_nombre'];
	        $genero_id=$_POST['genero_id'];
	        $edicion_id=$_POST['edicion_id'];
	        $editorial_id=$_POST['editorial_id'];
	        $autor_id=$_POST['autor_id'];
	        $idioma_id=$_POST['idioma_id'];
	        $revista_pagina=$_POST['revista_pagina'];
	        //$revista_foto=$_POST['revista_foto'];
	        $revista_cantidad=$_POST['revista_cantidad'];

            if(isset($_FILES['revista_foto'])){
            
                $ruta_vieja=$_POST['ruta'];
                $imagen=$_FILES['revista_foto']['name']; 
                $ruta_nueva="../web/assets/fotosRev/$imagen"; 
                
                unlink($ruta_vieja);
                move_uploaded_file($_FILES['revista_foto']['tmp_name'],$ruta_nueva);
            
            
           
                $sql="UPDATE revista SET revista_nombre='".$revista_nombre."', genero_id=$genero_id, edicion_id=$edicion_id, editorial_id=$editorial_id, autor_id=$autor_id, idioma_id=$idioma_id, revista_pagina='".$revista_pagina."', revista_cantidad='".$revista_cantidad."', revista_foto='".$ruta_nueva."' WHERE revista_id=$revista_id";
            }else{
                $sql="UPDATE revista SET revista_nombre='".$revista_nombre."', genero_id=$genero_id, edicion_id=$edicion_id, editorial_id=$editorial_id, autor_id=$autor_id, idioma_id=$idioma_id, revista_pagina='".$revista_pagina."', revista_cantidad='".$revista_cantidad."' WHERE revista_id=$revista_id";
            }   
        	


            $ejecucion=$objeto->update($sql);
            
            if ($ejecucion){

                redirect(getUrl("Revista","Revista","index"));   
            }else{
                echo "Se presentó un ERROR en el UPDATE";
            }
        }

        public function getEstado(){

        	$objeto=new RevistaModel();
            
            $revista_id=$_POST['revista_id'];
            $estado=$_POST['estado_revista'];

            if($estado==1){
                $sql="UPDATE revista SET estado_id=2 WHERE revista_id=$revista_id";
            }else if($estado==2){
                $sql="UPDATE revista SET estado_id=1 WHERE revista_id=$revista_id";
            }
            $objeto->update($sql);

           $sql="SELECT r.revista_id, r.revista_nombre, r.genero_id, g.genero_id, g.genero_desc, r.edicion_id, e.edicion_id, e.edicion_desc, r.editorial_id, t.editorial_id, t.editorial_desc, r.autor_id, a.autor_id, a.autor_desc, r.idioma_id, i.idioma_id, i.idioma_desc, r.revista_pagina, r.revista_cantidad, r.revista_foto, r.estado_id FROM genero g, edicion e, editorial t, autor a, idioma i, revista r WHERE r.genero_id=g.genero_id and r.edicion_id=e.edicion_id and r.editorial_id=t.editorial_id and r.autor_id=a.autor_id and r.idioma_id=i.idioma_id";

            $revista=$objeto->consult($sql);

            include_once '../view/Revista/modalEstado.php';
        }

        public function postDelete(){
            $objeto=new RevistaModel();
            
            $revista_id=$_POST['revista_id'];
            
            $sql="DELETE FROM revista WHERE revista_id=$revista_id";

            $ejecucion=$objeto->delete($sql);

            if ($ejecucion) {

                redirect(getUrl("Revista","Revista","index"));
            }else{
                echo "No se pudo eliminar";
            }
        }

		
			
	} 

?>