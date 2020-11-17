<?php
    include_once '../model/Acceso/AccesoModel.php';

    class AccesoController{
        public function login(){
            $user=$_POST['user'];
            $pass=$_POST['pass'];
            $objeto=new AccesoModel();

            $sql="SELECT usuario_id, usuario_nombre, usuario_apellidos, usuario_correo, rol_id FROM usuario WHERE usuario_contrasena='".$pass."' AND usuario_correo='".$user."'";

            $usuario=$objeto->consult($sql);

            if(pg_num_rows($usuario)>0){
                while($usu=pg_fetch_assoc($usuario)){
                    $_SESSION['id']=$usu['usuario_id'];
                    $_SESSION['nombre']=$usu['usuario_nombre'];
                    $_SESSION['apellido']=$usu['usuario_apellidos'];
                    $_SESSION['correo']=$usu['usuario_correo'];
                    
                    $_SESSION['rol']=$usu['rol_id'];
                  
                    $_SESSION['auth']="OK";
                }
               
                /*$sql1="SELECT * FROM rolusuario WHERE rol_id=$rol";
                $rol=$objeto->consult($sql1);

                while($roles=pg_fetch_assoc($rol)){

                    $_SESSION['rol_desc']=$roles['rol_desc'];
                    $_SESSION['rol_id']=$roles['rol'];*/
    
                  redirect("index.php");
                //}
            }else{
                echo "Error al iniciar sesion";
                redirect("login.php");
            }
            
        }

        public function logout(){
            session_destroy();
            redirect("login.php");
        }
    }
?>