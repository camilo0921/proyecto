<?php
    
    include_once '../model/PrestamoLibroUsuario/PrestamoLibroUsuarioModel.php';
    
    class PrestamoLibroUsuarioController{
        
        function getCreate(){
            $objeto=new PrestamoLibroUsuarioModel();

            $sql="SELECT * FROM libro";
            $libro=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

           
            include_once '../view/PrestamoLibroUsuario/create.php';
        }
        
        function postCreate(){
            
            $objeto=new PrestamoLibroUsuarioModel();
           
            $prestamo_fecha=$_POST['prestamo_fecha'];
            $libro_id=$_POST['libro_id'];
            $usuario_id=$_POST['usuario_id'];
            

            //$estado_id=1;

            $prestamo_id=$objeto->autoincrement("prestamolibro","prestamo_id");

            $sql="INSERT INTO prestamolibro VALUES($prestamo_id,'".$prestamo_fecha."','".$libro_id."','".$usuario_id."')";
            //$sql="INSERT INTO prestamolibro VALUES($prestamo_id,'"current_date"','".$libro_id."','".$usuario_id."')";

            $ejecucion=$objeto->insert($sql);

            if ($ejecucion){
                redirect(getUrl("PrestamoLibroUsuario","PrestamoLibroUsuario","index"));
            }else{
                redirect(getUrl("PrestamoLibroUsuario","PrestamoLibroUsuario","getCreate"));
            }
        }

        public function index(){
            $objeto=new PrestamoLibroUsuarioModel();
            $usuario_id=$_SESSION['id'];

            $sql="SELECT p.prestamo_id, p.prestamo_fecha, p.libro_id, l.libro_id, l.libro_nombre, u.usuario_nombre FROM libro l, usuario u, prestamolibro p WHERE p.libro_id=l.libro_id and p.usuario_id=u.usuario_id and p.usuario_id=$usuario_id";

            $prestamolibro=$objeto->consult($sql);

            include_once '../view/PrestamoLibroUsuario/index.php';
        }

        public function getDetalles(){
            $objeto=new PrestamoLibroUsuarioModel();

            $prestamo_id=$_POST['prestamo_id'];

            $sql5="SELECT * FROM prestamolibro WHERE prestamo_id=$prestamo_id";
            $prestamolibro=$objeto->consult($sql5);

            $sql="SELECT * FROM libro";
            $libro=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/PrestamoLibroUsuario/modalDescripcion.php';

            
        }

        function getUpdate(){

            $objeto=new PrestamoLibroUsuarioModel();

            $prestamo_id=$_POST['prestamo_id'];

            $sql5="SELECT * FROM prestamolibro WHERE prestamo_id=$prestamo_id";
            $prestamolibro=$objeto->consult($sql5);

            $sql="SELECT * FROM libro";
            $libro=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/PrestamoLibroUsuario/modalUpdate.php';
         
        }

        function postUpdate(){
            $objeto=new PrestamoLibroUsuarioModel();

            $prestamo_id=$_POST['prestamo_id'];
            $prestamo_fecha=$_POST['prestamo_fecha'];
            $libro_id=$_POST['libro_id'];
            $usuario_id=$_POST['usuario_id'];
            
            $sql="UPDATE prestamolibro SET prestamo_fecha='".$prestamo_fecha."', libro_id=$libro_id, usuario_id=$usuario_id WHERE prestamo_id=$prestamo_id";

            $ejecucion=$objeto->update($sql);
            
            if ($ejecucion){
                redirect(getUrl("PrestamoLibroUsuario","PrestamoLibroUsuario","index"));   
            }else{
                echo "Se presentó un ERROR en el UPDATE";
            }
        }

        public function getDelete(){
            $objeto=new PrestamoLibroUsuarioModel();

            $prestamo_id=$_POST['prestamo_id'];
            //$libro_id=$_POST['libro_id'];

            $sql="SELECT p.prestamo_id, p.prestamo_fecha, p.libro_id, l.libro_id, l.libro_nombre, p.usuario_id, u.usuario_id, u.usuario_nombre FROM libro l, usuario u, prestamolibro p WHERE p.libro_id=l.libro_id and p.usuario_id=u.usuario_id and p.prestamo_id=$prestamo_id";
            $prestamolibro=$objeto->consult($sql);

            $sql="SELECT * FROM libro";
            $libro=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/PrestamoLibroUsuario/modalDevolucion.php';
        }

        public function postDelete(){
            $objeto=new PrestamoLibroUsuarioModel();
            
            $prestamo_id=$_POST['prestamo_id'];
            $libro_id=$_POST['libro_id'];
            $usuario_id=$_SESSION['id'];
            

            $sql="DELETE FROM prestamolibro WHERE prestamo_id=$prestamo_id";
            $ejecucion=$objeto->delete($sql);



            $devolucion_id=$objeto->autoincrement("devolucionlibro","devolucion_id");
            $sql="INSERT INTO devolucionlibro VALUES($devolucion_id, CURRENT_DATE,'".$libro_id."','".$usuario_id."')";

            $ejecucion=$objeto->insert($sql);

            if ($ejecucion) {

                redirect(getUrl("PrestamoLibroUsuario","PrestamoLibroUsuario","index"));
            }else{
                echo "No se pudo eliminar";
            }
        }
    } 

?>