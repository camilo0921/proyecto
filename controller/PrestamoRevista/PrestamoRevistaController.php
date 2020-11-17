<?php
    
    include_once '../model/PrestamoRevista/PrestamoRevistaModel.php';
    
    class PrestamoRevistaController{
        
        function getCreate(){
            $objeto=new PrestamoRevistaModel();

            $sql="SELECT * FROM revista";
            $revista=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

           
            include_once '../view/PrestamoRevista/create.php';
        }
        
        function postCreate(){
            
            $objeto=new PrestamoRevistaModel();
           
            $prestamo_fecha=$_POST['prestamo_fecha'];
            $revista_id=$_POST['revista_id'];
            $usuario_id=$_POST['usuario_id'];
            

            //$estado_id=1;

            $prestamor_id=$objeto->autoincrement("prestamorevista","prestamor_id");

            $sql="INSERT INTO prestamorevista VALUES($prestamor_id,'".$prestamo_fecha."','".$revista_id."','".$usuario_id."')";

            $ejecucion=$objeto->insert($sql);

            if ($ejecucion){
                redirect(getUrl("PrestamoRevista","PrestamoRevista","index"));
            }else{
                redirect(getUrl("PrestamoRevista","PrestamoRevista","getCreate"));
            }
        }

        /*public function filtrorevista(){
            $objeto=new PrestamoRevistaModel();
            $gen=$_POST['gen'];
            $sql="SELECT * FROM revista WHERE genero_id=$gen";
            $revista=$objeto->consult($sql);
            echo "<option value=''>Seleccione...</option>";

            while($lib=pg_fetch_assoc($revista)){
                echo "<option value='".$lib['revista_id']."'>".$lib['revista_nombre']."</option>";
            }
        }*/

        public function index(){
            $objeto=new PrestamoRevistaModel();

            $sql="SELECT p.prestamor_id, p.prestamo_fecha, p.revista_id, r.revista_id, r.revista_nombre, p.usuario_id, u.usuario_id, u.usuario_nombre FROM revista r, usuario u, prestamorevista p WHERE p.revista_id=r.revista_id and p.usuario_id=u.usuario_id";

            $prestamorevista=$objeto->consult($sql);

            include_once '../view/PrestamoRevista/index.php';
        }

        public function getDetalles(){
            $objeto=new PrestamoRevistaModel();

            $prestamor_id=$_POST['prestamor_id'];

            $sql5="SELECT * FROM prestamorevista WHERE prestamor_id=$prestamor_id";
            $prestamorevista=$objeto->consult($sql5);

            $sql="SELECT * FROM revista";
            $revista=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/PrestamoRevista/modalDescripcion.php';
            
        }

        function getUpdate(){

            $objeto=new PrestamoRevistaModel();

            $prestamor_id=$_POST['prestamor_id'];

            $sql5="SELECT * FROM prestamorevista WHERE prestamor_id=$prestamor_id";
            $prestamorevista=$objeto->consult($sql5);

            $sql="SELECT * FROM revista";
            $revista=$objeto->consult($sql);

            $sql2="SELECT * FROM usuario";
            $usuario=$objeto->consult($sql2);

            include_once '../view/PrestamoRevista/modalUpdate.php';
         
        }

        function postUpdate(){
            $objeto=new PrestamoRevistaModel();
            
            $prestamor_id=$_POST['prestamor_id'];
            $prestamo_fecha=$_POST['prestamo_fecha'];
            $revista_id=$_POST['revista_id'];
            $usuario_id=$_POST['usuario_id'];
            
            $sql="UPDATE prestamorevista SET prestamo_fecha='".$prestamo_fecha."', revista_id=$revista_id, usuario_id=$usuario_id WHERE prestamor_id=$prestamor_id";

            $ejecucion=$objeto->update($sql);
            
            if ($ejecucion){

                redirect(getUrl("PrestamoRevista","PrestamoRevista","index"));   
            }else{
                echo "Se presentó un ERROR en el UPDATE";
            }

        }


        public function getDelete(){
            $prestamor_id=$_POST['prestamor_id'];

            $objeto=new PrestamoRevistaModel();

            $sql="SELECT p.prestamor_id, p.prestamo_fecha, p.revista_id, r.revista_id, r.revista_nombre, p.usuario_id, u.usuario_id, u.usuario_nombre FROM revista r, usuario u, prestamo p WHERE p.revista_id=r.revista_id and p.usuario_id=u.usuario_id";

            $prestamorevista=$objeto->consult($sql);
            
            include_once '../view/PrestamoRevista/modalDelete.php';
        }

        public function postDelete(){
            $objeto=new PrestamoRevistaModel();
            
            $prestamor_id=$_POST['prestamor_id'];
            
            $sql="DELETE FROM prestamorevista WHERE prestamor_id=$prestamor_id";

            $ejecucion=$objeto->delete($sql);

            if ($ejecucion) {

                redirect(getUrl("PrestamoRevista","PrestamoRevista","index"));
            }else{
                echo "No se pudo eliminar";
            }
        }
            
    } 

?>