<?php
    
    include_once '../model/PrestamoRevistaUsuario/PrestamoRevistaUsuarioModel.php';
    
    class PrestamoRevistaUsuarioController{
        
        function getCreate(){
            $objeto=new PrestamoRevistaUsuarioModel();

            $sql="SELECT * FROM revista";
            $revista=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

           
            include_once '../view/PrestamoRevistaUsuario/create.php';
        }
        
        function postCreate(){
            
            $objeto=new PrestamoRevistaUsuarioModel();
           
            $prestamo_fecha=$_POST['prestamo_fecha'];
            $revista_id=$_POST['revista_id'];
            $usuario_id=$_POST['usuario_id'];
            

            //$estado_id=1;

            $prestamor_id=$objeto->autoincrement("prestamorevista","prestamor_id");

            $sql="INSERT INTO prestamorevista VALUES($prestamor_id,'".$prestamo_fecha."','".$revista_id."','".$usuario_id."')";
            //$sql="INSERT INTO prestamorevista VALUES($prestamor_id,'"current_date"','".$revista_id."','".$usuario_id."')";

            $ejecucion=$objeto->insert($sql);

            if ($ejecucion){
                redirect(getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","index"));
            }else{
                redirect(getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","getCreate"));
            }
        }

        public function index(){
            $objeto=new PrestamoRevistaUsuarioModel();
            $usuario_id=$_SESSION['id'];

            $sql="SELECT t.prestamor_id, t.prestamo_fecha, r.revista_nombre, u.usuario_nombre FROM revista r, usuario u, prestamorevista t WHERE t.revista_id=r.revista_id and t.usuario_id=u.usuario_id and t.usuario_id=$usuario_id";

            $prestamorevista=$objeto->consult($sql);

            include_once '../view/PrestamoRevistaUsuario/index.php';
        }

        public function getDetalles(){
            $objeto=new PrestamoRevistaUsuarioModel();

            $prestamor_id=$_POST['prestamor_id'];

            $sql5="SELECT * FROM prestamorevista WHERE prestamor_id=$prestamor_id";
            $prestamorevista=$objeto->consult($sql5);

            $sql="SELECT * FROM revista";
            $revista=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/PrestamoRevistaUsuario/modalDescripcion.php';
        }

        function getUpdate(){

            $objeto=new PrestamoRevistaUsuarioModel();

            $prestamor_id=$_POST['prestamor_id'];

            $sql5="SELECT * FROM prestamorevista WHERE prestamor_id=$prestamor_id";
            $prestamorevista=$objeto->consult($sql5);

            $sql="SELECT * FROM revista";
            $revista=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/PrestamoRevistaUsuario/modalUpdate.php';
         
        }

        function postUpdate(){
            $objeto=new PrestamoRevistaUsuarioModel();

            $prestamor_id=$_POST['prestamor_id'];
            $prestamo_fecha=$_POST['prestamo_fecha'];
            $revista_id=$_POST['revista_id'];
            $usuario_id=$_POST['usuario_id'];
            
            $sql="UPDATE prestamorevista SET prestamo_fecha='".$prestamo_fecha."', revista_id=$revista_id, usuario_id=$usuario_id WHERE prestamor_id=$prestamor_id";

            $ejecucion=$objeto->update($sql);
            
            if ($ejecucion){
                redirect(getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","index"));   
            }else{
                echo "Se presentó un ERROR en el UPDATE";
            }
        }

        public function getDelete(){
            $prestamor_id=$_POST['prestamor_id'];

            $objeto=new PrestamoRevistaUsuarioModel();

            $sql="SELECT p.prestamor_id, p.prestamo_fecha, p.revista_id, r.revista_id, r.revista_nombre, p.usuario_id, u.usuario_id, u.usuario_nombre FROM revista r, usuario u, prestamorevista p WHERE p.revista_id=r.revista_id and p.usuario_id=u.usuario_id";

            
            $prestamorevista=$objeto->consult($sql);
            
            include_once '../view/PrestamoRevistaUsuario/modalDevolver.php';
        }

        public function postDelete(){
            $objeto=new PrestamoRevistaUsuarioModel();

            $prestamor_id=$_POST['prestamor_id'];
            $revista_id=$_POST['revista_id'];
            $usuario_id=$_SESSION['id'];

            $sql="DELETE FROM prestamorevista WHERE prestamor_id=$prestamor_id";

            $ejecucion=$objeto->delete($sql);
            
            $devolucionr_id=$objeto->autoincrement("devolucionlibro","devolucionr_id");
            $sql="INSERT INTO devolucionrevista VALUES($devolucionr_id, CURRENT_DATE,'".$revista_id."','".$usuario_id."')";

            $ejecucion=$objeto->insert($sql);

            if ($ejecucion) {

                redirect(getUrl("PrestamoRevistaUsuario","PrestamoRevistaUsuario","index"));
            }else{
                echo "No se pudo eliminar";
            }
        }
            
    } 

?>