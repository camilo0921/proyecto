<?php

    include_once '../model/Rol/RolModel.php';

    class RolController{
        
        function getCreate(){
            
            include_once '../view/Rol/create.php';
        }

        function postCreate(){
            $objeto=new RolModel();

            $rol_desc=$_POST['rol_desc'];
            $rol_id=$objeto->autoincrement("rolusuario","rol_id");

            $sql="INSERT INTO rolusuario VALUES($rol_id,'$rol_desc')";

            $objeto->insert($sql);

            redirect(getUrl("Rol","Rol","index"));
        }

        public function index(){
            $objeto=new RolModel();

            $sql="SELECT * FROM rolusuario";
            $rol=$objeto->consult($sql);

            include_once '../view/Rol/index.php';
        }

        public function getUpdate(){
            $rol_id=$_POST['rol_id'];

            $objeto=new RolModel();

            $sql="SELECT * FROM rolusuario WHERE rol_id=$rol_id";

            $rol=$objeto->consult($sql);

            include_once '../view/Rol/modalUpdate.php';
        }

        public function postUpdate(){
            $objeto=new RolModel();

            $rol_id=$_POST['rol_id'];
            $rol_desc=$_POST['rol_desc'];

            $sql="UPDATE rolusuario SET rol_desc='$rol_desc' WHERE rol_id=$rol_id";
            $objeto->update($sql);

            redirect(getUrl("Rol","Rol","index"));
        }

        public function getDelete(){
            $rol_id=$_POST['rol_id'];

            $objeto=new RolModel();

            $sql="SELECT * FROM rolusuario WHERE rol_id=$rol_id";
            $rol=$objeto->consult($sql);

            include_once '../view/Rol/modalDelete.php';
        }

        public function postDelete(){
            $objeto=new RolModel();

            $rol_id=$_POST['rol_id'];

            $sql="DELETE FROM rolusuario WHERE rol_id=$rol_id";
            $objeto->update($sql);

            redirect(getUrl("Rol","Rol","index"));
        }
    }
?>