<?php

    include_once '../model/Idioma/IdiomaModel.php';

    class IdiomaController{
        
        function getCreate(){
            
            include_once '../view/Idioma/create.php';
        }

        function postCreate(){
            $objeto=new IdiomaModel();

            $idioma_desc=$_POST['idioma_desc'];
            $idioma_id=$objeto->autoincrement("idioma","idioma_id");

            $sql="INSERT INTO idioma VALUES($idioma_id,'$idioma_desc')";

            $objeto->insert($sql);

            redirect(getUrl("Idioma","Idioma","index"));
        }

        public function index(){
            $objeto=new IdiomaModel();

            $sql="SELECT * FROM idioma";
            $idioma=$objeto->consult($sql);

            include_once '../view/Idioma/index.php';
        }

        public function getUpdate(){
            $idioma_id=$_POST['idioma_id'];

            $objeto=new IdiomaModel();

            $sql="SELECT * FROM idioma WHERE idioma_id=$idioma_id";

            $idioma=$objeto->consult($sql);

            include_once '../view/Idioma/modalUpdate.php';
        }

        public function postUpdate(){
            $objeto=new IdiomaModel();

            $idioma_id=$_POST['idioma_id'];
            $idioma_desc=$_POST['idioma_desc'];

            $sql="UPDATE idioma SET idioma_desc='$idioma_desc' WHERE idioma_id=$idioma_id";
            $objeto->update($sql);

            redirect(getUrl("Idioma","Idioma","index"));
        }

        public function getDelete(){
            $idioma_id=$_POST['idioma_id'];

            $objeto=new IdiomaModel();

            $sql="SELECT * FROM idioma WHERE idioma_id=$idioma_id";
            $idioma=$objeto->consult($sql);

            include_once '../view/Idioma/modalDelete.php';
        }

        public function postDelete(){
            $objeto=new IdiomaModel();

            $idioma_id=$_POST['idioma_id'];

            $sql="DELETE FROM idioma WHERE idioma_id=$idioma_id";
            $objeto->update($sql);

            redirect(getUrl("Idioma","Idioma","index"));
        }
    }
?>