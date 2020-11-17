<?php

    include_once '../model/Edicion/EdicionModel.php';

    class EdicionController{
        
        function getCreate(){
            
            include_once '../view/Edicion/create.php';
        }

        function postCreate(){
            $objeto=new EdicionModel();

            $edicion_desc=$_POST['edicion_desc'];
            $edicion_id=$objeto->autoincrement("edicion","edicion_id");

            $sql="INSERT INTO edicion VALUES($edicion_id,'$edicion_desc')";

            $objeto->insert($sql);

            redirect(getUrl("Edicion","Edicion","index"));
        }

        public function index(){
            $objeto=new EdicionModel();

            $sql="SELECT * FROM edicion";
            $edicion=$objeto->consult($sql);

            include_once '../view/Edicion/index.php';
        }

        public function getUpdate(){
            $edicion_id=$_POST['edicion_id'];

            $objeto=new EdicionModel();

            $sql="SELECT * FROM edicion WHERE edicion_id=$edicion_id";
            $edicion=$objeto->consult($sql);

            include_once '../view/Edicion/modalUpdate.php';
        }

        public function postUpdate(){
            $objeto=new EdicionModel();

            $edicion_id=$_POST['edicion_id'];
            $edicion_desc=$_POST['edicion_desc'];

            $sql="UPDATE edicion SET edicion_desc='$edicion_desc' WHERE edicion_id=$edicion_id";
            $objeto->update($sql);

            redirect(getUrl("Edicion","Edicion","index"));
        }

        public function getDelete(){
            $edicion_id=$_POST['edicion_id'];

            $objeto=new EdicionModel();

            $sql="SELECT * FROM edicion WHERE edicion_id=$edicion_id";
            $edicion=$objeto->consult($sql);

            include_once '../view/Edicion/modalDelete.php';
        }

        public function postDelete(){
            $objeto=new EdicionModel();

            $edicion_id=$_POST['edicion_id'];

            $sql="DELETE FROM edicion WHERE edicion_id=$edicion_id";
            $objeto->update($sql);

            redirect(getUrl("Edicion","Edicion","index"));
        }
    }
?>