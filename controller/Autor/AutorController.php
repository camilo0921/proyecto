<?php

    include_once '../model/Autor/AutorModel.php';

    class AutorController{
        
        function getCreate(){
            
            include_once '../view/Autor/create.php';
        }

        function postCreate(){
            $objeto=new AutorModel();

            $autor_desc=$_POST['autor_desc'];
            $autor_id=$objeto->autoincrement("autor","autor_id");

            $sql="INSERT INTO autor VALUES($autor_id,'$autor_desc')";

            $objeto->insert($sql);

            redirect(getUrl("Autor","Autor","index"));
        }

        public function index(){
            $objeto=new AutorModel();

            $sql="SELECT * FROM autor";
            $autor=$objeto->consult($sql);

            include_once '../view/Autor/index.php';
        }

        public function getUpdate(){
            $autor_id=$_POST['autor_id'];

            $objeto=new AutorModel();

            $sql="SELECT * FROM autor WHERE autor_id=$autor_id";

            $autor=$objeto->consult($sql);

            include_once '../view/Autor/modalUpdate.php';
        }

        public function postUpdate(){
            $objeto=new AutorModel();

            $autor_id=$_POST['autor_id'];
            $autor_desc=$_POST['autor_desc'];

            $sql="UPDATE autor SET autor_desc='$autor_desc' WHERE autor_id=$autor_id";
            $objeto->update($sql);

            redirect(getUrl("Autor","Autor","index"));
        }

        public function getDelete(){
            $autor_id=$_POST['autor_id'];

            $objeto=new AutorModel();

            $sql="SELECT * FROM autor WHERE autor_id=$autor_id";
            $autor=$objeto->consult($sql);

            include_once '../view/Autor/modalDelete.php';
        }

        public function postDelete(){
            $objeto=new AutorModel();

            $autor_id=$_POST['autor_id'];

            $sql="DELETE FROM autor WHERE autor_id=$autor_id";
            $objeto->update($sql);

            redirect(getUrl("Autor","Autor","index"));
        }
    }
?>