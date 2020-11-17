<?php

    include_once '../model/Genero/GeneroModel.php';

    class GeneroController{
        
        function getCreate(){
            
            include_once '../view/Genero/create.php';
        }

        function postCreate(){
            $objeto=new GeneroModel();

            $genero_desc=$_POST['genero_desc'];
            $genero_id=$objeto->autoincrement("genero","genero_id");

            $sql="INSERT INTO genero VALUES($genero_id,'$genero_desc')";

            $objeto->insert($sql);

            redirect(getUrl("Genero","Genero","index"));
        }

        public function index(){
            $objeto=new GeneroModel();

            $sql="SELECT * FROM genero";
            $genero=$objeto->consult($sql);

            include_once '../view/Genero/index.php';
        }

        public function getUpdate(){
            $genero_id=$_POST['genero_id'];

            $objeto=new GeneroModel();

            $sql="SELECT * FROM genero WHERE genero_id=$genero_id";

            $genero=$objeto->consult($sql);

            include_once '../view/Genero/modalUpdate.php';
        }

        public function postUpdate(){
            $objeto=new GeneroModel();

            $genero_id=$_POST['genero_id'];
            $genero_desc=$_POST['genero_desc'];

            $sql="UPDATE genero SET genero_desc='$genero_desc' WHERE genero_id=$genero_id";
            $objeto->update($sql);

            redirect(getUrl("Genero","Genero","index"));
        }

        public function getDelete(){
            $genero_id=$_POST['genero_id'];

            $objeto=new GeneroModel();

            $sql="SELECT * FROM genero WHERE genero_id=$genero_id";
            $genero=$objeto->consult($sql);

            include_once '../view/Genero/modalDelete.php';
        }

        public function postDelete(){
            $objeto=new GeneroModel();

            $genero_id=$_POST['genero_id'];

            $sql="DELETE FROM genero WHERE genero_id=$genero_id";
            $objeto->update($sql);

            redirect(getUrl("Genero","Genero","index"));
        }
    }
?>