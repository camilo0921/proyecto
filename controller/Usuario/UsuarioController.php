<?php

    include_once '../model/Usuario/UsuarioModel.php';

    class UsuarioController{

        public function getCreate(){
            $objeto=new UsuarioModel();

            $sql2="SELECT * FROM rolusuario";
            $rol=$objeto->consult($sql2);

            include_once '../view/Usuario/create.php';
        }

        public function index(){
            $objeto=new UsuarioModel();

            $sql="SELECT u.usuario_id, u.usuario_identificacion, u.usuario_nombre, u.usuario_apellidos, u.usuario_telefono, u.usuario_fecha_nac, u.usuario_correo, u.usuario_contrasena, u.rol_id, r.rol_id, r.rol_desc FROM rolusuario r, usuario u WHERE u.rol_id=r.rol_id";

            $usuario=$objeto->consult($sql);

            include_once '../view/Usuario/index.php';

        }

        function postCreate(){
                
            $objeto=new UsuarioModel();

            $usuario_identificacion=$_POST['usuario_identificacion'];
            $usuario_nombre=$_POST['usuario_nombre'];
            $usuario_apellidos=$_POST['usuario_apellidos'];
            $usuario_telefono=$_POST['usuario_telefono'];
            $usuario_fecha_nac=$_POST['usuario_fecha_nac'];
            $usuario_correo=$_POST['usuario_correo'];
            $usuario_contrasena=$_POST['usuario_contrasena'];
            $rol_id=$_POST['rol_id'];
            
            
            //$estado_id=1;

            $usuario_id=$objeto->autoincrement("Usuario","usuario_id");

            if ($_SESSION['rol']==2) {    

               $sql="INSERT INTO usuario VALUES($usuario_id,'".$usuario_identificacion."','".$usuario_nombre."','".$usuario_apellidos."','".$usuario_telefono."','".$usuario_fecha_nac."','".$usuario_correo."','".$usuario_contrasena."',3)";

            }else{

                $sql="INSERT INTO usuario VALUES($usuario_id,'".$usuario_identificacion."','".$usuario_nombre."','".$usuario_apellidos."','".$usuario_telefono."','".$usuario_fecha_nac."','".$usuario_correo."','".$usuario_contrasena."','".$rol_id."')";
        
            }

                $ejecucion=$objeto->insert($sql);

                    if ($ejecucion){
                    redirect(getUrl("Usuario","Usuario","index"));

                    }else{
                        redirect(getUrl("Usuario","Usuario","getCreate"));
                    }
        }

        public function getDetalles(){
            $objeto=new UsuarioModel();

            $usuario_id=$_POST['usuario_id'];

            $sql5="SELECT * FROM usuario WHERE usuario_id=$usuario_id";
            $usuario=$objeto->consult($sql5);

            $sql="SELECT * FROM rolusuario";
            $rol=$objeto->consult($sql);

            /*$sql1="SELECT * FROM estado";
            $estado=$objeto->consult($sql1);*/

           

            include_once '../view/Usuario/modalDescripcion.php';
            
        }
            
        function getUpdate(){

            $objeto=new UsuarioModel();
            $usuario_id=$_POST['usuario_id'];
        
            $sql="SELECT * FROM usuario WHERE usuario_id=$usuario_id";

            $usuario=$objeto->consult($sql);

            $sql2="SELECT * FROM rolusuario";
            $rol=$objeto->consult($sql2);
                

            include_once '../view/Usuario/ModalUpdate.php';
         
        }

        function postUpdate(){
            $objeto=new UsuarioModel();
            
            $usuario_id=$_POST['usuario_id'];
            $usuario_identificacion=$_POST['usuario_identificacion'];
            $usuario_nombre=$_POST['usuario_nombre'];
            $usuario_apellidos=$_POST['usuario_apellidos'];
            $usuario_telefono=$_POST['usuario_telefono'];
            $usuario_fecha_nac=$_POST['usuario_fecha_nac'];
            $usuario_correo=$_POST['usuario_correo'];
            $usuario_contrasena=$_POST['usuario_contrasena'];

            $rol_id=$_POST['rol_id'];
            

             
            $sql="UPDATE usuario SET usuario_identificacion='".$usuario_identificacion."', usuario_nombre='".$usuario_nombre."', usuario_apellidos='".$usuario_apellidos."', usuario_telefono='".$usuario_telefono."', usuario_fecha_nac='".$usuario_fecha_nac."', usuario_correo='".$usuario_correo."', usuario_contrasena='".$usuario_contrasena."', rol_id=$rol_id WHERE usuario_id=$usuario_id";



            $ejecucion=$objeto->update($sql);
            
            if ($ejecucion){

                redirect(getUrl("Usuario","Usuario","index"));   
            }else{
                echo "Se presentó un ERROR en el UPDATE";
            }
            alert($sql);
        }

        function getDelete(){
            $objeto=new UsuarioModel();
            $usuario_id=$_POST['id'];
            $estado=$_POST['estado'];

            if($estado==1) {
               $sql="UPDATE usuario SET estado_id=2 WHERE usuario_id=$usuario_id";
            }else if($estado==2){
               $sql="UPDATE usuario SET estado_id=1 WHERE usuario_id=$usuario_id";

            }
         
            $objeto->update($sql);

            $sql="SELECT u.usuario_id, u.usuario_identificacion, u.usuario_nombre, u.usuario_apellidos, u.usuario_telefono, u.usuario_fecha_nac, u.usuario_correo, u.usuario_contrasena, u.rol_id, r.rol_id, r.rol_desc FROM rolusuario r, usuario u WHERE u.rol_id=r.rol_id";

            $usuario=$objeto->consult($sql);

            include_once '../view/Usuario/eliminar.php';


        }

    }
?>