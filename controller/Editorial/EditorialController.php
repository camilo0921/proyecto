<?php

    include_once '../model/Editorial/EditorialModel.php';

    class EditorialController{
        
        function getCreate(){
            
            include_once '../view/Editorial/create.php';
        }

        function postCreate(){
            $objeto=new EditorialModel();

            $editorial_desc=$_POST['editorial_desc'];
            $editorial_id=$objeto->autoincrement("editorial","editorial_id");

            $sql="INSERT INTO editorial VALUES($editorial_id,'$editorial_desc')";

            $objeto->insert($sql);

            redirect(getUrl("Editorial","Editorial","index"));
        }

        public function index(){
            $objeto=new EditorialModel();

            $sql="SELECT * FROM editorial";
            $editorial=$objeto->consult($sql);

            include_once '../view/Editorial/index.php';
        }

        public function getUpdate(){
            $editorial_id=$_POST['editorial_id'];

            $objeto=new EditorialModel();

            $sql="SELECT * FROM editorial WHERE editorial_id=$editorial_id";

            $editorial=$objeto->consult($sql);

            include_once '../view/Editorial/modalUpdate.php';
        }

        public function postUpdate(){
            $objeto=new EditorialModel();

            $editorial_id=$_POST['editorial_id'];
            $editorial_desc=$_POST['editorial_desc'];

            $sql="UPDATE editorial SET editorial_desc='$editorial_desc' WHERE editorial_id=$editorial_id";
            $objeto->update($sql);

            redirect(getUrl("Editorial","Editorial","index"));
        }

        public function getDelete(){
            $editorial_id=$_POST['editorial_id'];

            $objeto=new EditorialModel();

            $sql="SELECT * FROM editorial WHERE editorial_id=$editorial_id";
            $editorial=$objeto->consult($sql);

            include_once '../view/Editorial/modalDelete.php';
        }

        public function postDelete(){
            $objeto=new EditorialModel();

            $editorial_id=$_POST['editorial_id'];

            $sql="DELETE FROM editorial WHERE editorial_id=$editorial_id";
            $objeto->update($sql);

            redirect(getUrl("Editorial","Editorial","index"));
        }
    }
?>