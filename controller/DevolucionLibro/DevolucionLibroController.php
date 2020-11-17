<?php
    
    include_once '../model/DevolucionLibro/DevolucionLibroModel.php';
    
    class DevolucionLibroController{
        
        function getCreate(){
            $objeto=new DevolucionLibroModel();

            $sql="SELECT * FROM libro";
            $libro=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

           
            include_once '../view/DevolucionLibro/create.php';
        }
        
        function postCreate(){
            
            $objeto=new DevolucionLibroModel();
           
            $devolucion_fecha=$_POST['devolucion_fecha'];
            $libro_id=$_POST['libro_id'];
            $usuario_id=$_POST['usuario_id'];
            

            //$estado_id=1;

            $devolucion_id=$objeto->autoincrement("devolucionlibro","devolucion_id");

            $sql="INSERT INTO devolucionlibro VALUES($devolucion_id, current_date,'".$libro_id."','".$usuario_id."')";

            //$sql="INSERT INTO Devolucionlibro VALUES($devolucion_id, current_date,'".$libro_id."','".$usuario_id."')";

            $ejecucion=$objeto->insert($sql);

            if ($ejecucion){
                redirect(getUrl("DevolucionLibro","DevolucionLibro","index"));
            }else{
                redirect(getUrl("DevolucionLibro","DevolucionLibro","getCreate"));
            }
        }

       
        public function index(){
            $objeto=new DevolucionLibroModel();

            $sql="SELECT d.devolucion_id, d.devolucion_fecha, d.libro_id, l.libro_id, l.libro_nombre, d.usuario_id, u.usuario_id, u.usuario_nombre FROM libro l, usuario u, devolucionlibro d WHERE d.libro_id=l.libro_id and d.usuario_id=u.usuario_id";

            $devolucionlibro=$objeto->consult($sql);

            include_once '../view/DevolucionLibro/index.php';
        }

        public function getDetalles(){
            $objeto=new DevolucionLibroModel();

            $devolucion_id=$_POST['devolucion_id'];

            $sql5="SELECT * FROM devolucionlibro WHERE devolucion_id=$devolucion_id";
            $devolucionlibro=$objeto->consult($sql5);

            $sql="SELECT * FROM libro";
            $libro=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/DevolucionLibro/modalDetalles.php';

            
        }

        function getUpdate(){

            $objeto=new DevolucionLibroModel();

            $devolucion_id=$_POST['devolucion_id'];

            $sql5="SELECT * FROM devolucionlibro WHERE devolucion_id=$devolucion_id";
            $devolucionlibro=$objeto->consult($sql5);

            $sql="SELECT * FROM libro";
            $libro=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/DevolucionLibro/modalUpdate.php';
         
        }

        function postUpdate(){
            $objeto=new DevolucionLibroModel();

            $devolucion_id=$_POST['devolucion_id'];
            $devolucion_fecha=$_POST['devolucion_fecha'];
            $libro_id=$_POST['libro_id'];
            $usuario_id=$_POST['usuario_id'];
            
            $sql="UPDATE devolucionlibro SET devolucion_fecha='".$devolucion_fecha."', libro_id=$libro_id, usuario_id=$usuario_id WHERE devolucion_id=$devolucion_id";

            $ejecucion=$objeto->update($sql);
            
            if ($ejecucion){
                redirect(getUrl("devolucionLibro","devolucionLibro","index"));   
            }else{
                echo "Se presentó un ERROR en el UPDATE";
            }
        }


        public function getDelete(){
            $devolucion_id=$_POST['devolucion_id'];

            $objeto=new DevolucionLibroModel();

            $sql="SELECT d.devolucion_id, d.devolucion_fecha, d.libro_id, l.libro_id, l.libro_nombre, d.usuario_id, u.usuario_id, u.usuario_nombre FROM libro l, usuario u, devolucionlibro d WHERE d.libro_id=l.libro_id and d.usuario_id=u.usuario_id";

            $devolucionlibro=$objeto->consult($sql);
            
            include_once '../view/DevolucionLibro/modalDelete.php';
        }

        public function postDelete(){
            $objeto=new DevolucionLibroModel();
            
            $devolucion_id=$_POST['devolucion_id'];
            
            $sql="DELETE FROM devolucionlibro WHERE devolucion_id=$devolucion_id";

            $ejecucion=$objeto->delete($sql);

            if ($ejecucion) {

                redirect(getUrl("DevolucionLibro","DevolucionLibro","index"));
            }else{
                echo "No se pudo eliminar";
            }
        }
            
    } 

?>