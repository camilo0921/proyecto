<?php
	
	include_once '../model/Libro/LibroModel.php';
	
	class LibroController{
		
		function getCreate(){
			$objeto=new LibroModel();

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

           

			include_once '../view/Libro/create.php';
		}
		
		function postCreate(){
            
            $objeto=new LibroModel();
           
            $libro_nombre=$_POST['libro_nombre'];
            $genero_id=$_POST['genero_id'];
            $edicion_id=$_POST['edicion_id'];
            $editorial_id=$_POST['editorial_id'];
            $autor_id=$_POST['autor_id'];
            $idioma_id=$_POST['idioma_id'];
            $libro_pagina=$_POST['libro_pagina'];
            $libro_cantidad=$_POST['libro_cantidad'];
			$estado_id=1;

			
            $imagen=$_FILES['libro_foto']['name'];
			$ruta="../web/assets/fotosLib/$imagen";

            move_uploaded_file($_FILES['libro_foto']['tmp_name'],$ruta);

			$libro_id=$objeto->autoincrement("libro","libro_id");

            $sql="INSERT INTO libro VALUES($libro_id,'".$libro_nombre."','".$genero_id."','".$edicion_id."','".$editorial_id."','".$autor_id."','".$idioma_id."','".$libro_pagina."','".$libro_cantidad."',$estado_id,'".$ruta."')";

            $ejecucion=$objeto->insert($sql);

            if ($ejecucion){
                redirect(getUrl("Libro","Libro","index"));
            }else{
                redirect(getUrl("Libro","Libro","getCreate"));
            }
        }

		public function index(){
            $objeto=new LibroModel();

            if ($_SESSION['rol']==1 or $_SESSION['rol']==2){
            	$sql="SELECT l.libro_id, l.libro_nombre, l.genero_id, g.genero_id, g.genero_desc, l.edicion_id, e.edicion_id, e.edicion_desc,  l.editorial_id, t.editorial_id, t.editorial_desc,  l.autor_id, a.autor_id, a.autor_desc,  l.idioma_id, i.idioma_id, i.idioma_desc, l.libro_pagina, l.libro_cantidad, l.estado_id, l.libro_foto FROM genero g, edicion e, editorial t, autor a, idioma i,  libro l WHERE l.genero_id=g.genero_id and l.edicion_id=e.edicion_id and l.editorial_id=t.editorial_id and l.autor_id=a.autor_id and l.idioma_id=i.idioma_id";
            }else{
            	$sql="SELECT l.libro_id, l.libro_nombre, l.genero_id, g.genero_id, g.genero_desc, l.edicion_id, e.edicion_id, e.edicion_desc,  l.editorial_id, t.editorial_id, t.editorial_desc,  l.autor_id, a.autor_id, a.autor_desc,  l.idioma_id, i.idioma_id, i.idioma_desc, l.libro_pagina, l.libro_cantidad, l.estado_id, l.libro_foto FROM genero g, edicion e, editorial t, autor a, idioma i,  libro l WHERE l.genero_id=g.genero_id and l.edicion_id=e.edicion_id and l.editorial_id=t.editorial_id and l.autor_id=a.autor_id and l.idioma_id=i.idioma_id and l.estado_id=1";
           	}


			$libro=$objeto->consult($sql);

      		include_once '../view/Libro/index.php';
        }

        public function getDetalles(){
            $objeto=new LibroModel();

            $libro_id=$_POST['libro_id'];

            $sql5="SELECT * FROM libro WHERE libro_id=$libro_id";
            $libro=$objeto->consult($sql5);

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

            include_once '../view/Libro/modalDescripcion.php';
            
        }

		function getUpdate(){

	        $objeto=new LibroModel();
	        $libro_id=$_POST['libro_id'];
	    
	        $sql="SELECT * FROM libro WHERE libro_id=$libro_id";
			$libro=$objeto->consult($sql);

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

	        include_once '../view/Libro/modalUpdate.php';
	     
		}

		function postUpdate(){
            $objeto=new LibroModel();
            
	        $libro_id=$_POST['libro_id'];
	        $libro_nombre=$_POST['libro_nombre'];
	        $genero_id=$_POST['genero_id'];
	        $edicion_id=$_POST['edicion_id'];
	        $editorial_id=$_POST['editorial_id'];
	        $autor_id=$_POST['autor_id'];
	        $idioma_id=$_POST['idioma_id'];
	        $libro_pagina=$_POST['libro_pagina'];
	        //$libro_foto=$_POST['libro_foto'];
	        $libro_cantidad=$_POST['libro_cantidad'];

	        if(isset($_FILES['libro_foto'])){
            
                $ruta_vieja=$_POST['ruta'];
                $imagen=$_FILES['libro_foto']['name']; 
                $ruta_nueva="../web/assets/fotosLib/$imagen"; 
                
                unlink($ruta_vieja);
				move_uploaded_file($_FILES['libro_foto']['tmp_name'],$ruta_nueva);

             
        		$sql="UPDATE libro SET libro_nombre='".$libro_nombre."', genero_id=$genero_id, edicion_id=$edicion_id, editorial_id=$editorial_id, autor_id=$autor_id, idioma_id=$idioma_id, libro_pagina='".$libro_pagina."', libro_cantidad='".$libro_cantidad."', libro_foto='".$ruta_nueva."' WHERE libro_id=$libro_id";
        	}else{
        		$sql="UPDATE libro SET libro_nombre='".$libro_nombre."', genero_id=$genero_id, edicion_id=$edicion_id, editorial_id=$editorial_id, autor_id=$autor_id, idioma_id=$idioma_id, libro_pagina='".$libro_pagina."', libro_cantidad='".$libro_cantidad."' WHERE libro_id=$libro_id";
        	}


            $ejecucion=$objeto->update($sql);
            
            if ($ejecucion){

                redirect(getUrl("Libro","Libro","index"));   
            }else{
                echo "Se presentó un ERROR en el UPDATE";
            }
        }


		public function getEstado(){
			$objeto=new LibroModel();
			$libro_id=$_POST['id'];
			$estado=$_POST['estado'];

			if($estado==1){
                $sql="UPDATE libro SET estado_id=2 WHERE libro_id=$libro_id";
            }else if($estado==2){
                $sql="UPDATE libro SET estado_id=1 WHERE libro_id=$libro_id";
            }
            $objeto->update($sql);

			$sql="SELECT l.libro_id, l.libro_nombre, l.genero_id, g.genero_id, g.genero_desc, l.edicion_id, e.edicion_id, e.edicion_desc,  l.editorial_id, t.editorial_id, t.editorial_desc,  l.autor_id, a.autor_id, a.autor_desc,  l.idioma_id, i.idioma_id, i.idioma_desc, l.libro_pagina, l.libro_cantidad, l.estado_id, l.libro_foto FROM genero g, edicion e, editorial t, autor a, idioma i, libro l WHERE l.genero_id=g.genero_id and l.edicion_id=e.edicion_id and l.editorial_id=t.editorial_id and l.autor_id=a.autor_id and l.idioma_id=i.idioma_id";


			$libro=$objeto->consult($sql);
			
			include_once '../view/Libro/modalEstado.php';

		}

		public function postDelete(){
			$objeto=new LibroModel();
			
			$libro_id=$_POST['libro_id'];
			
			$sql="DELETE FROM libro WHERE libro_id=$libro_id";

			$ejecucion=$objeto->delete($sql);

			if ($ejecucion) {

                redirect(getUrl("Libro","Libro","index"));
            }else{
                echo "No se pudo eliminar";
            }
		}
			
	} 

?>